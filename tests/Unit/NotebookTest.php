<?php

namespace Tests\Unit;

use App\Models\Notebook;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NotebookTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_notebook()
    {
        $notebook = Notebook::create([
            'name' => 'John Doe',
            'company' => 'Acme Inc.',
            'phone' => '555-1234',
            'email' => 'john.doe@example.com',
            'birthday' => '1990-01-01',
            'photo' => 'http://example.com/photo.jpg',
        ]);

        $this->assertDatabaseHas('notebooks', [
            'id' => $notebook->id,
            'name' => 'John Doe',
            'company' => 'Acme Inc.',
            'phone' => '555-1234',
            'email' => 'john.doe@example.com',
            'birthday' => '1990-01-01',
            'photo' => 'http://example.com/photo.jpg',
        ]);
    }

    /** @test */
    public function it_can_update_a_notebook()
    {
        $notebook = Notebook::create([
            'name' => 'John Doe',
            'company' => 'Acme Inc.',
            'phone' => '555-1234',
            'email' => 'john.doe@example.com',
            'birthday' => '1990-01-01',
            'photo' => 'http://example.com/photo.jpg',
        ]);

        $notebook->update([
            'name' => 'Jane Doe',
            'company' => 'XYZ Corp.',
            'phone' => '555-5678',
            'email' => 'jane.doe@example.com',
            'birthday' => '1995-01-01',
            'photo' => 'http://example.com/new-photo.jpg',
        ]);

        $this->assertDatabaseHas('notebooks', [
            'id' => $notebook->id,
            'name' => 'Jane Doe',
            'company' => 'XYZ Corp.',
            'phone' => '555-5678',
            'email' => 'jane.doe@example.com',
            'birthday' => '1995-01-01',
            'photo' => 'http://example.com/new-photo.jpg',
        ]);
    }

    /** @test */
    public function it_can_delete_a_notebook()
    {
        $notebook = Notebook::create([
            'name' => 'John Doe',
            'company' => 'Acme Inc.',
            'phone' => '555-1234',
            'email' => 'john.doe@example.com',
            'birthday' => '1990-01-01',
            'photo' => 'http://example.com/photo.jpg',
        ]);

        $notebook->delete();

        $this->assertDatabaseMissing('notebooks', [
            'id' => $notebook->id,
        ]);
    }
}
