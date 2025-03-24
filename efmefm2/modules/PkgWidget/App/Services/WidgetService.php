<?php

namespace Modules\PkgWidget\App\Services;

class WidgetService
{
    // Existing service methods...

    public function getNombreApprenant()
    {
        // Example method returning data
        return [
            'title' => 'Nombre d\'Apprenants',
            'value' => 42,
        ];
    }

    public function getApprenantsActifs()
    {
        // Example method returning data
        $learners = ['Alice', 'Bob', 'Charlie', 'David', 'Eve'];
        return [
            'title' => 'Apprenants Actifs',
            'list'  => $learners,
            'total' => count($learners),
        ];
    }

    /**
     * Dynamically execute a method by name.
     *
     * @param string $methodName
     * @return array An array with either 'result' or 'error' key.
     */
    public function dynamicCall(string $methodName): array
    {
        try {
            // Check if the method exists in this service.
            if (!method_exists($this, $methodName)) {
                throw new \Exception("The method '{$methodName}' does not exist in WidgetService.");
            }

            // Dynamically call the method.
            $result = call_user_func([$this, $methodName]);

            // Return the result wrapped in a 'result' key.
            return ['result' => $result];
        } catch (\Exception $e) {
            // Return the error message wrapped in an 'error' key.
            return ['error' => $e->getMessage()];
        }
    }
}
