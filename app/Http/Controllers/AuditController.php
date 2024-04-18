<?php

namespace App\Http\Controllers;

use Spatie\Activitylog\Models\Activity;

class AuditController extends Controller
{
    public function index()
    {
        $activities = Activity::latest()->paginate(10);

        foreach ($activities as $activity) {
            $changes = json_decode($activity->changes(), true);
            $old = $changes['old'] ?? [];
            $attributes = $changes['attributes'] ?? [];

            $activity->old = $this->arrayToString($old);
            $activity->new = $this->arrayToString($attributes);
        }

        return view('auditories.index', compact('activities'));
    }

    public function arrayToString($array)
    {
        $result = [];

        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result[] = $this->arrayToString($value);
            } else {
                $result[] = "$key: $value";
            }
        }
        return implode(', ', $result);
    }
}
