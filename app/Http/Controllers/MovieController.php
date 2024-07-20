<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Showtime;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('movie.index', compact('movies'));
    }
    public function create()
    {
        return view('movie.create');
    }
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'release_date' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation for the image
        ]);

        // Handle the file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('movie_images', 'public');
        }

        // Create a new movie
        Movie::create([
            'title' => $request->title,
            'description' => $request->description,
            'release_date' => $request->release_date,
            'image' => $imagePath, // Save the file path in the database
        ]);

        // Redirect to the movies list with a success message
        return redirect('/')->with('success', 'Movie added successfully!');
    }
    public function show($id)
    {
        $movie = Movie::find($id);
        $showtimes = $movie->showtimes;
        return view('movie.show', compact('movie', 'showtimes'));
    }
    
    public function showtimes(Movie $movie)
{
    return view('movie.showtime', compact('movie'));
}

// Handle the form submission and store the showtime
public function storeShowtime(Request $request, Movie $movie)
{
    // Validate the request data
    $request->validate([
        'showtime' => 'required|date',
    ]);

    // Create a new showtime
    Showtime::create([
        'movie_id' => $movie->id,
        'showtime' => $request->showtime,
    ]);

    // Redirect back to the showtimes form with a success message
    return redirect()->route('showtimes.create', $movie->id)->with('success', 'Showtime added successfully!');
}

}
