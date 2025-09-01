<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PatientTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::factory()->create();
        $this->actingAs($this->admin);
    }

    public function test_admin_can_view_patient_show_page()
    {
        $patient = Patient::factory()->create();

        $response = $this->get("/admin/patients/{$patient->id}");
        $response->assertStatus(200);
        $response->assertSee($patient->name);
    }

    public function test_admin_can_create_patient_via_form()
    {
        $data = ['name' => 'Özv. Major Ramóna', 'email' => 'simon.angela@example.org'];

        $response = $this->post("/admin/patients", $data);
        $response->assertRedirect();
        $this->assertDatabaseHas('patients', $data);
    }

    public function test_admin_can_update_patient()
    {
        $patient = Patient::factory()->create();
        $update = ['name' => 'Jane Doe', 'email' => $patient->email];

        $response = $this->put("/admin/patients/{$patient->id}", $update);
        $response->assertRedirect();
        $this->assertDatabaseHas('patients', $update);
    }

    public function test_admin_can_delete_patient()
    {
        $patient = Patient::factory()->create();

        $response = $this->delete("/admin/patients/{$patient->id}");
        $response->assertRedirect();
        $this->assertDatabaseMissing('patients', ['id' => $patient->id]);
    }

    public function test_non_admin_cannot_access_patient_routes()
    {
        auth()->logout();
        $patient = Patient::factory()->create();

        $this->get("/admin/patients")->assertStatus(302);
        $this->get("/admin/patients/create")->assertStatus(302);
        $this->post("/admin/patients", ['name' => 'X'])->assertStatus(302);
        $this->get("/admin/patients/{$patient->id}")->assertStatus(302);
        $this->get("/admin/patients/{$patient->id}/edit")->assertStatus(302);
        $this->put("/admin/patients/{$patient->id}", ['name' => 'Y'])->assertStatus(302);
        $this->delete("/admin/patients/{$patient->id}")->assertStatus(302);
    }
}
