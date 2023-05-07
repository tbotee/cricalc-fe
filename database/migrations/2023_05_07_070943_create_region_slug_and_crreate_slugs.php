<?php

use App\Helpers\StringHelper;
use App\Models\Region;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('regions', 'slug')) {
            Schema::table('regions', function (Blueprint $table) {
                $table->string('slug', 30)->after('name');
            });
        }

        $regions = Region::all();

        foreach ($regions as $region) {
            $region->slug = StringHelper::convertToSlug($region->name);
            $region->save();
        }
    }

    public function down(): void
    {
        Schema::table('regions', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
