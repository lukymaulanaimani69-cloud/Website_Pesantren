<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PagesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Seed the database before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(); // Run all seeders defined in DatabaseSeeder
    }

    public function test_home_page_returns_success()
    {
        $response = $this->get(route('home'));
        $response->assertStatus(200);
    }

    public function test_psb_info_page_returns_success()
    {
        $response = $this->get(route('psb.info'));
        $response->assertStatus(200);
    }

    public function test_profil_sejarah_page_returns_success()
    {
        $response = $this->get(route('profil.sejarah'));
        $response->assertStatus(200);
    }

    public function test_program_index_page_returns_success()
    {
        $response = $this->get(route('program.index'));
        $response->assertStatus(200);
    }

    public function test_berita_index_page_returns_success()
    {
        $response = $this->get(route('berita.index'));
        $response->assertStatus(200);
    }

    public function test_agenda_index_page_returns_success()
    {
        $response = $this->get(route('agenda.index'));
        $response->assertStatus(200);
    }

    public function test_galeri_index_page_returns_success()
    {
        $response = $this->get(route('galeri.index'));
        $response->assertStatus(200);
    }

    public function test_fasilitas_index_page_returns_success()
    {
        $response = $this->get(route('fasilitas.index'));
        $response->assertStatus(200);
    }

    public function test_faq_index_page_returns_success()
    {
        $response = $this->get(route('faq.index'));
        $response->assertStatus(200);
    }

    public function test_kontak_page_returns_success()
    {
        $response = $this->get(route('kontak.index'));
        $response->assertStatus(200);
    }
}
