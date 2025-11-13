<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

use function PHPUnit\Framework\countOf;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $people = Person
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Person $person)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        //
    }

    function search(Request $request)
    {
        $query = $request->input('query');

        $results = Person::where('idNumber', 'like', "%{$query}%")
            ->orWhere('firstName', 'like', "%{$query}%")
            ->orWhere('middleName', 'like', "%{$query}%")
            ->orWhere('thirdName', 'like', "%{$query}%")
            ->orWhere('LastName', 'like', "%{$query}%")
            ->orWhereRaw("CONCAT(firstName, ' ', middleName, ' ', thirdName, ' ', LastName) LIKE ?", ["%{$query}%"])
            ->get();

        $resultsCount = count($results);

            // هناا مشكلة الكود مكرر و زيادة كويري عالداتابيز ما عرفت أحلها غير هيك 
          // ##back herreee##

        $results = Person::where('idNumber', 'like', "%{$query}%")
            ->orWhere('firstName', 'like', "%{$query}%")
            ->orWhere('middleName', 'like', "%{$query}%")
            ->orWhere('thirdName', 'like', "%{$query}%")
            ->orWhere('LastName', 'like', "%{$query}%")
            ->orWhereRaw("CONCAT(firstName, ' ', middleName, ' ', thirdName, ' ', LastName) LIKE ?", ["%{$query}%"])
            ->paginate(10);


        return view('user.results', compact('results', 'resultsCount', 'query'));
    }
}
