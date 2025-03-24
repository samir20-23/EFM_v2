<?php 
// efm/app/Services/WidgetService.php
namespace App\Services;

class WidgetService
{
    public function getNombreApprenant()
    {
        return (object) [
            'title' => 'Nombre d\'apprenants',
            'value' => 120
        ];
    }

    public function getApprenantsActifs()
    {
        return [
            'title' => 'Apprenants actifs',
            'list' => ['John Doe', 'Jane Smith', 'Paul Brown', 'Emma White', 'Lucas Black'],
            'total' => 5
        ];
    }

    public function getNombreApprenantsParNomFamille()
    {
        return [
            'title' => 'Nombre d\'apprenants par nom de famille',
            'list' => [
                'Smith' => 30,
                'Brown' => 25,
                'White' => 15
            ]
        ];
    }
}
