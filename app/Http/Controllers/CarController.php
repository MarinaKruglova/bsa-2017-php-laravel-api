<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Car;
use App\Repositories\Contracts\CarRepositoryInterface;

class CarController extends Controller
{

    private $carsRepository;

    public function __construct(CarRepositoryInterface $carsRepository)
    {
        $this->carsRepository = $carsRepository;
    }

    public function index()
    {
        $cars = $this->carsRepository->getAll();
        $carsFiltered = array();

        foreach ($cars as $car) {
            array_push($carsFiltered, [
                'color' => $car->getColor(),
                'id' => $car->getId(),
                'model' => $car->getModel(),
                'year' => $car->getYear(),
                'price' => $car->getPrice()
            ]);
        }

        return response()->json($carsFiltered);
    }

    public function store(Request $request)
    {
        $newCar = new Car($request->all());
        return response()->json($this->carsRepository->store($newCar));
    }

    public function show(int $id)
    {
        $car = $this->carsRepository->getById($id);

        if (is_object($car)) {
            $response = response()->json($car);
        } else {
            $response = response()->json(['error' => "No car with id $id"], 404);
        }

        return $response;
    }

    public function update(Request $request, int $id)
    {
        $car = $this->carsRepository->getById($id);
        if ($car) {
            $car->fromArray($request->all());
        }
        
        if (is_object($car)) {
            $response = response()->json($car);
        } else {
            $response = response()->json(['error' => "No car with id $id"], 404);
        }

        return $response;
    }

    public function destroy(int $id)
    {
        $car = $this->carsRepository->getById($id);
        $collection = $this->carsRepository->delete($id);
        if (is_object($car)) {
            $response = $collection;
        } else {
            $response = response()->json(['error' => "No car with id $id"], 404);
        }

        return $response;
    }
}
