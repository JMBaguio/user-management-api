<?php

namespace App\Http\Controllers;

use App\Services\WorkService;
use App\Http\Requests\StoreWorkRequest;
use Illuminate\Support\Facades\Auth;

class WorkController extends Controller
{
    protected $workService;

    public function __construct(WorkService $workService)
    {
        $this->workService = $workService;
    }

    // Show all approved works
    public function index()
    {
        $works = $this->workService->getApprovedWorks(); // fetch approved works
        return view('works.index', compact('works'));
    }

    // Show create work form
    public function create()
    {
        return view('works.create');
    }

    // Store a new work
    public function store(StoreWorkRequest $request)
    {
        $data = $request->validated();
        $images = $request->file('images'); // expecting multiple images

        $this->workService->createWork(array_merge($data, [
            'user_id' => Auth::id(),
            'approval_status' => 'pending'
        ]), $images);

        return redirect()->route('works.index')
            ->with('success', 'Your work has been uploaded for review.');
    }

    // Show a single work
    public function show($id)
    {
        $work = $this->workService->getWorkWithRelations($id);
        $moreWorks = $this->workService->getMoreWorksByUser($work->user_id, $work->id);
        return view('works.show', compact('work','moreWorks'));
    }

    // Show all works by a specific upcycler
    public function byUpcycler($userId)
    {
        $works = $this->workService->getWorksByUser($userId);
        return view('works.by-upcycler', compact('works'));
    }
}
