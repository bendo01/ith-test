<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdministratorTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testSeeLoginPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/auth/login')
                    ->assertSee('SISTEM INFORMASI AKADEMIK');
        });
    }
    
    public function testAdministratorLoginAndShowDashboardPage() {
        $this->browse(function (Browser $browser) {
            $browser->visit('/auth/login')
                    ->pause(5000)
                    ->assertSee('SISTEM INFORMASI AKADEMIK')
                    ->type('email', 'rizki')
                    ->type('password', 'rizki')
                    ->press('Login')
                    ->assertPathIs('/administrator/home')
                    ->assertSee('TOTAL MAHASISWA AKTIF SELURUH PRODI')
                    ->pause(5000)
                    ->visit('/auth/logout')
                    ->assertSee('SISTEM INFORMASI AKADEMIK');
        });
    }
    
    public function testAdministratorLoginAndGoToFacultyPage() {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://ith.jmcindonesia.com/auth/login')
                    ->assertSee('SISTEM INFORMASI AKADEMIK')
                    ->type('email', 'rizki')
                    ->type('password', 'rizki')
                    ->press('Login')
                    ->assertPathIs('/administrator/home')
                    ->visit('/administrator/fakultas')
                    ->assertPathIs('/administrator/fakultas')
                    ->assertSee('Daftar Fakultas')
                    ->visit('/auth/logout')
                    ->assertSee('SISTEM INFORMASI AKADEMIK');
        });
    }
    
    public function testAdministratorLoginAndGoToMajorPage() {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://ith.jmcindonesia.com/auth/login')
                    ->assertSee('SISTEM INFORMASI AKADEMIK')
                    ->type('email', 'rizki')
                    ->type('password', 'rizki')
                    ->press('Login')
                    ->assertPathIs('/administrator/home')
                    ->visit('/administrator/jurusan')
                    ->assertPathIs('/administrator/jurusan')
                    ->assertSee('Daftar Jurusan')
                    ->visit('/auth/logout')
                    ->assertSee('SISTEM INFORMASI AKADEMIK');
        });
    }

    
    public function testAdministratorLoginAndGoToUnitPage() {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://ith.jmcindonesia.com/auth/login')
                    ->assertSee('SISTEM INFORMASI AKADEMIK')
                    ->type('email', 'rizki')
                    ->type('password', 'rizki')
                    ->press('Login')
                    ->assertPathIs('/administrator/home')
                    ->visit('/administrator/prodi')
                    ->assertPathIs('/administrator/prodi')
                    ->assertSee('Daftar Prodi')
                    ->visit('/auth/logout')
                    ->assertSee('SISTEM INFORMASI AKADEMIK');
        });
    }

    public function testAdministratorLoginAndGoToAcademicYearPage() {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://ith.jmcindonesia.com/auth/login')
                    ->assertSee('SISTEM INFORMASI AKADEMIK')
                    ->type('email', 'rizki')
                    ->type('password', 'rizki')
                    ->press('Login')
                    ->assertPathIs('/administrator/home')
                    ->visit('/administrator/tahun_ajaran')
                    ->assertPathIs('/administrator/tahun_ajaran')
                    ->assertSee('Daftar Tahun Ajaran')
                    ->visit('/auth/logout')
                    ->assertSee('SISTEM INFORMASI AKADEMIK');
        });
    }
}
