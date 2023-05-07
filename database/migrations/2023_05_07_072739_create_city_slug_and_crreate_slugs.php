<?php

use App\Helpers\StringHelper;
use App\Models\City;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('cities', 'slug')) {
            Schema::table('cities', function (Blueprint $table) {
                $table->string('slug', 30)->after('name');
            });
        }

        $regions = City::all();

        foreach ($regions as $region) {
            $region->slug = StringHelper::convertToSlug($region->name);
            $region->save();
        }
    }

    public function down(): void
    {
        Schema::table('cities', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }


};
