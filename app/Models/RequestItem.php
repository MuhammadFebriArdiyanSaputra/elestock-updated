<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class RequestItem extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'alasan', 'status'];

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi dengan Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // Scope untuk filter berdasarkan status
    public function scopePending(Builder $query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeApproved(Builder $query)
    {
        return $query->where('status', 'approved');
    }

    public function scopeRejected(Builder $query)
    {
        return $query->where('status', 'rejected');
    }

    public function getStatusBadgeAttribute()
    {
        if ($this->status === 'pending') {
            return '<span class="badge badge-warning">Pending</span>';
        } elseif ($this->status === 'approved') {
            return '<span class="badge badge-success">Disetujui</span>';
        } elseif ($this->status === 'rejected') {
            return '<span class="badge badge-danger">Ditolak</span>';
        }
    }

    public function decrementStok()
    {
        $this->product->decrement('stok', 1);
    }

    // Fungsi untuk menyetujui permintaan barang
    public function approve()
    {
        if ($this->status === 'pending') {
            $this->status = 'approved';
            $this->save();

            // Kurangi stok barang yang diminta
            $this->decrementStok();
        }
    }

    // Fungsi untuk menolak permintaan barang
    public function reject()
    {
        if ($this->status === 'pending') {
            $this->status = 'rejected';
            $this->save();
        }
    }
}