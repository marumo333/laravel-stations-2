<?php

namespace Tests\Feature\LaravelStations\Station2;

use App\Http\Controllers\PracticeController;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;

class PracticeTest extends TestCase
{
    #[Test]
    #[Group('station2')]
    public function testPracticeが表示されるか(): void
    {
        $response = $this->get('/practice');
        $response->assertStatus(200);
        $response->assertSeeText('practice');
    }

    #[Test]
    #[Group('station2')]
    public function testPractice2が表示されるか(): void
    {
        $response = $this->get('/practice2');
        $response->assertStatus(200);
        $response->assertSeeText('practice2');
    }

    #[Test]
    #[Group('station2')]
    public function testPractice3が表示されるか(): void
    {
        $response = $this->get('/practice3');
        $response->assertStatus(200);
        $response->assertSeeText('test');
    }

    #[Test]
    #[Group('station2')]
    public function testSampleメソッドが存在するか()
    {
        $controller = new PracticeController();
        $response = $controller->sample();
        $this->assertNotEmpty($response);
    }

    #[Test]
    #[Group('station2')]
    public function testSample2メソッドが存在するか()
    {
        $controller = new PracticeController();
        $response = $controller->sample2();
        // If sample2 returns a string or view, check for expected content instead
        $this->assertNotEmpty($response);
    }

    #[Test]
    #[Group('station2')]
    public function testSample3メソッドが存在するか()
    {
        $response = $this->get('/practice3');
        $response->assertStatus(200);
    }
}
