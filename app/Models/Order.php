<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const STATE_NEW = 1;
    const STATE_ACCEPTED = 2;
    const STATE_IN_PROGRESS = 3;
    const STATE_COMPLETE = 4;
    const STATE_FAILED = 0;

    const FIRST = 1;
    const SECOND = 2;
    const THIRD = 3;


    protected $fillable = [
        'orderStatus',
        'class',
        'price',
        'pointA',
        'pointB',
        'reviewGiven',
        'customerId',
        'taxiDriverId',
    ];

    public function isReviewGiven(): bool
    {
        return $this->reviewGiven;
    }

    public function setReviewGiven(bool $reviewGiven): void
    {
        $this->reviewGiven = $reviewGiven;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getPointB(): string
    {
        return $this->pointB;
    }

    public function getPointA(): string
    {
        return $this->pointA;
    }

    public function getTaxiDriverId(): ?int
    {
        return $this->taxiDriverId;
    }

    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    public function getCarClass(): int
    {
        return $this->class;
    }

    public function getDayCreated(): DateTime
    {
        return $this->dayCreated;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getStatus(): int
    {
        return $this->orderStatus;
    }

    public function setPointB(string $pointB): void
    {
        $this->pointB = $pointB;
    }

    public function setPointA(string $pointA): void
    {
        $this->pointA = $pointA;
    }

    public function setTaxiDriverId(?int $taxiDriverId): void
    {
        $this->taxiDriverId = $taxiDriverId;
    }

    public function setCustomerId(int $customerId): void
    {
        $this->customerId = $customerId;
    }

    public function setClass(int $class): void
    {
        $this->class = $class;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function setOrderStatus(int $orderStatus): void
    {
        $this->orderStatus = $orderStatus;
    }

    public function getOrderStatus(): int
    {
        return $this->orderStatus;
    }

    public function failed(): void
    {
        $this->orderStatus = self::STATE_FAILED;
    }

    public function stateNew(): void
    {
        $this->orderStatus = self::STATE_NEW;
    }

    public function accepted(): void
    {
        $this->orderStatus = self::STATE_ACCEPTED;
    }

    public function inProgress(): void
    {
        $this->orderStatus = self::STATE_IN_PROGRESS;
    }

    public function complete(): void
    {
        $this->orderStatus = self::STATE_COMPLETE;
    }

    public function giveReview(): void
    {
        $this->reviewGiven = true;
    }


    public static function calculatePrice(int $personalDiscount, int $class): int
    {
        $priceDefault = rand(50, 250);
        $price = 0;


        if ($class == Car::FIRST) {
            $price = $priceDefault * 3;
        } elseif ($class == Car::SECOND) {
            $price = $priceDefault * 2;
        } elseif ($class == Car::THIRD) {
            $price = $priceDefault;
        }

        return $price - ($price * ($personalDiscount / 100)); //цена со скидкой;
    }

    public function statusToString(): string
    {
        $string = "";
        if($this->getOrderStatus() == self::STATE_FAILED) {
            $string = "Failed";
        } elseif ($this->getOrderStatus() == self::STATE_NEW){
            $string = "New";
        } elseif ($this->getOrderStatus() == self::STATE_ACCEPTED){
            $string = "Accepted";
        } elseif ($this->getOrderStatus() == self::STATE_IN_PROGRESS){
            $string = "In progress";
        } elseif ($this->getOrderStatus() == self::STATE_COMPLETE){
            $string = "Complete";
        }
        return $string;
    }

    public function classToString(): string
    {
        $string = "";
        if($this->getCarClass() == 1) {
            $string = "First";
        } elseif ($this->getCarClass()  == 2){
            $string = "Second";
        } elseif ($this->getCarClass()  == 3){
            $string = "Third";
        }
        return $string;
    }

}
