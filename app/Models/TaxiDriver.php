<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TaxiDriver extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasFactory;

    protected $fillable = [
        'firstName',
        'secondName',
        'password',
        'birthday',
        'phoneNumber',
        'carDriving',
    ];


    public function getReviewsGiven(): ?int
    {
        return $this->reviewsGiven;
    }

    public function getReviewHeap(): ?int
    {
        return $this->reviewHeap;
    }

    public function setReviewsGiven(int $reviewsGiven): void
    {
        $this->reviewsGiven = $reviewsGiven;
    }

    public function getCarDriving(): int
    {
        return $this->carDriving;
    }

    public function setCarDriving(int $carDriving): void
    {
        $this->carDriving = $carDriving;
    }

    public function getQualification(): string
    {
        return $this->qualification;
    }

    public function getRating(): ?float
    {
        return $this->rating;
    }

    public function getExperience(): int
    {
        return $this->experience;
    }

    public function getSecondName(): string
    {
        return $this->secondName;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getBirthday(): DateTime
    {
        return $this->birthday;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setRating(float $rating): void
    {
        $this->rating = $rating;
    }

    public function setQualification(string $qualification): void
    {
        $this->qualification = $qualification;
    }

    public function setExperience(int $experience): void
    {
        $this->experience = $experience;
    }

    public function setSecondName(string $secondName): void
    {
        $this->secondName = $secondName;
    }
    public function setBirthday(DateTime $birthday): void
    {
        $this->birthday = $birthday;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function takeCar(int $carId)
    {

    } //todo ????????????

    public function reviewIsGiven(): void
    {
        $this->reviewsGiven += 1;
    }

    public function addReviewToHeap(int $review): void
    {
        $this->reviewHeap += $review;
    }

    public function reevaluateRating(): void
    {
        if ($this->reviewsGiven > 9) {
            $this->rating = $this->reviewHeap / $this->reviewsGiven;
        }
    }
}
