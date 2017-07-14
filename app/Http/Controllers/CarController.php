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

    public function store(int $id)
    {
    }

    public function show(int $id)
    {
    }

    public function update()
    {
    }

    public function destroy()
    {
    }


}