<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class BookingController extends Controller
{
    //
    public function book(Request $request)
{
    $booking = new Booking();
    $booking->showtime_id = $request->showtime_id;
    $booking->name = $request->name;
    $booking->seats = $request->seats;
    $booking->save();

    // Redirect to ticket download
    return redirect()->route('download.ticket', $booking->id);
}

public function downloadTicket(Booking $booking)
{
    // Generate PDF
    $pdf = PDF::loadView('tickets.show', ['booking' => $booking]);
    $pdfContent = $pdf->output();

    // Set headers for PDF download
    $headers = [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="ticket-' . $booking->id . '.pdf"',
    ];

    // Return the PDF as a response for download
    return Response::make($pdfContent, 200, $headers);
}

}
