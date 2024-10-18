<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'old_price',       // New field
        'sku',
        'delivery_time',   // New field
        'images',
        'ram_id',
        'cooler_aios_id',
        'ssd_id',
        'hard_disk_id',
        'reader_writer_id',
        'foods_id',
        'case_fan_id',
        'sound_card_id',
        'wi_fi_id',
        'mouse_id',
        'screen_id',
        'accessory_id',
        'software_id',
        'operating_systems_id',
        'processors_id',
        'motherboard_id',
        'graphics_card_id',
        'housings_id',
    ];

    // Relationships

    public function ram()
    {
        return $this->belongsTo(Ram::class, 'ram_id');
    }

    public function coolerAios()
    {
        return $this->belongsTo(CoolerAio::class, 'cooler_aios_id');
    }

    public function ssd()
    {
        return $this->belongsTo(Ssd::class, 'ssd_id');
    }

    public function hardDisk()
    {
        return $this->belongsTo(HardDisk::class, 'hard_disk_id');
    }

    public function readerWriter()
    {
        return $this->belongsTo(ReaderWriter::class, 'reader_writer_id');
    }

    public function food()
    {
        return $this->belongsTo(Food::class, 'foods_id');
    }

    public function caseFan()
    {
        return $this->belongsTo(CaseFan::class, 'case_fan_id');
    }

    public function soundCard()
    {
        return $this->belongsTo(SoundCard::class, 'sound_card_id');
    }

    public function wifi()
    {
        return $this->belongsTo(Wifi::class, 'wi_fi_id');
    }

    public function mouse()
    {
        return $this->belongsTo(Mouse::class, 'mouse_id');
    }

    public function screen()
    {
        return $this->belongsTo(Screen::class, 'screen_id');
    }

    public function accessory()
    {
        return $this->belongsTo(Accessory::class, 'accessory_id');
    }

    public function software()
    {
        return $this->belongsTo(Software::class, 'software_id');
    }

    public function operatingSystem()
    {
        return $this->belongsTo(OperatingSystem::class, 'operating_systems_id');
    }

    public function processor()
    {
        return $this->belongsTo(Processor::class, 'processors_id');
    }

    public function motherboard()
    {
        return $this->belongsTo(Motherboard::class, 'motherboard_id');
    }

    public function graphicsCard()
    {
        return $this->belongsTo(GraphicsCard::class, 'graphics_card_id');
    }

    public function housing()
    {
        return $this->belongsTo(Housing::class, 'housings_id');
    }
}
