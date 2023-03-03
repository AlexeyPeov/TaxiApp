<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;



    protected $fillable = [
        'firstName',
        'secondName',
        'birthday',
        'personalDiscount',
        'phoneNumber',
        'orderCount',
        'orderDeclinedCount',
        // add other fillable attributes here
    ];

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function getBirthday(): ?DateTime
    {
        return $this->birthday;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getSecondName(): ?string
    {
        return $this->secondName;
    }

    public function getPersonalDiscount(): int
    {
        return $this->personalDiscount;
    }

    public function getOrderCount(): int
    {
        return $this->orderCount;
    }

    public function getOrderDeclinedCount(): int
    {
        return $this->orderDeclinedCount;
    }

    public function getPhoneNum(): string
    {
        return $this->phoneNum;
    }

    public function setBirthday(?DateTime $birthday): void
    {
        $this->birthday = $birthday;
    }

    public function setSecondName(?string $secondName): void
    {
        $this->secondName = $secondName;
    }

    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function declinedAnOrder(): void
    {
        $this->orderDeclinedCount -=1;
    }

    public function setPhoneNum(string $phoneNum): void
    {
        $this->phoneNum = $phoneNum;
    }

    public function updateOrderCount() : void
    {
        $this->orderCount = ($this->orderCount + 1);
        if ($this->orderCount > 5 && $this->orderCount <= 10) {
            $this->personalDiscount = 5;
        } elseif ($this->orderCount > 10 && $this->orderCount <= 15) {
            $this->personalDiscount = 10;
        } elseif ($this->orderCount > 15 && $this->orderCount <= 20) {
            $this->personalDiscount = 15;
        } elseif ($this->orderCount > 20) {
            $this->personalDiscount = 20;
        }
    }

    public function declinedOrder():void
    {
        $this->orderDeclinedCount = +1;
    }
}
