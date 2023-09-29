<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\StakeholderRepository;
use App\Http\Requests\StoreStakeholderRequest;
use App\Http\Requests\UpdateStakeholderRequest;

class StakeholderController extends Controller
{
    public function __construct(
        protected StakeholderRepository $stakeholderRepository
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('components.stakeholders.index', [
            'title'        => 'Stakeholders',
            'stakeholders' => $this->stakeholderRepository->getAll(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): string
    {
        return $this->formView();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStakeholderRequest $request)
    {
        // Validiere und speichere das Stakeholder-Modell
        $data = $request->validate([
            'name'    => 'required|string',
            'inprint' => 'required|string',
        ]);

        $stakeholder = $this->stakeholderRepository->create($data);
        // Weitere Aktionen nach dem Speichern, z.B. Weiterleitung oder Rückgabe von Daten
    }

    /**
     * Display the specified resource.
     */
    public function show(Stakeholder $stakeholder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): string
    {
        return $this->formView($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStakeholderRequest $request, $id)
    {
        $stakeholder = $this->stakeholderRepository->getById($id);

        // Validiere und aktualisiere das Stakeholder-Modell
        $data = $request->validate([
            'name'    => 'required|string',
            'inprint' => 'required|string',
        ]);

        $this->stakeholderRepository->update($stakeholder, $data);
        // Weitere Aktionen nach der Aktualisierung, z.B. Weiterleitung oder Rückgabe von Daten
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $stakeholder = $this->stakeholderRepository->getById($id);

        // Lösche das Stakeholder-Modell
        $this->stakeholderRepository->delete($stakeholder);
        // Weitere Aktionen nach der Löschung, z.B. Weiterleitung oder Rückgabe von Daten
    }

    private function formView(int $id = null): string
    {
        return (string)view('components.stakeholders.form', [
            'title'       => $id
                ? __('Stakeholder bearbeiten')
                : __('Einen neuen Stakeholder anlegen')
            ,
            'stakeholder' => (object)($id
                ? (function () use ($id) {
                    $stakeholder = $this->stakeholderRepository->getById($id);

                    return (object)[
                        'id'      => $stakeholder->id,
                        'name'    => $stakeholder->name,
                        'imprint' => $stakeholder->imprint,
                        'urls'    => $stakeholder->urls->pluck('url')->toArray(
                        ),
                    ];
                })()
                : []
            ),
        ]);
    }
}
