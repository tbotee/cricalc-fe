<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        $this->updateRegion('Arges', 'Argeș');
        $this->updateRegion('Bistrita-Nasaud', 'Bistrița-Năsăud');
        $this->updateRegion('Botosani', 'Botoșani');
        $this->updateRegion('Braila', 'Brăila');
        $this->updateRegion('Brasov', 'Brașov');
        $this->updateRegion('Bucuresti - Ilfov', 'București - Ilfov');
        $this->updateRegion('Buzau', 'Buzău');
        $this->updateRegion('Calarasi', 'Călărași');
        $this->updateRegion('Caras-Severin', 'Caraș-Severin');
        $this->updateRegion('Constanta', 'Constanța');
        $this->updateRegion('Dambovita', 'Dâmbovița');
        $this->updateRegion('Galati', 'Galați');
        $this->updateRegion('Ialomita', 'Ialomița');
        $this->updateRegion('Iasi', 'Iași');
        $this->updateRegion('Maramures', 'Maramureș');
        $this->updateRegion('Mures', 'Mureș');
        $this->updateRegion('Maramures', 'Maramureș');
        $this->updateRegion('Neamt', 'Neamț');
        $this->updateRegion('Salaj', 'Sălaj');
        $this->updateRegion('Timis', 'Timiș');
        $this->updateRegion('Valcea', 'Vâlcea');
    }

    public function down(): void
    {
        //
    }

    private function updateRegion(string $oldValue, string $newValue): void
    {
        DB::table('regions')
            ->where('name', $oldValue)
            ->update(['name' => $newValue]);
    }
};
