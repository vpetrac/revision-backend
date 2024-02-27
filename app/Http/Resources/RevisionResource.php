<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RevisionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'planned_start_of_internal_revision' => $this->planned_start_of_internal_revision,
            'actual_start_of_internal_revision' => $this->actual_start_of_internal_revision,
            'planned_draft_of_revision_report' => $this->planned_draft_of_revision_report,
            'actual_draft_of_revision_report' => $this->actual_draft_of_revision_report,
            'planned_final_revision_report' => $this->planned_final_revision_report,
            'actual_final_revision_report' => $this->actual_final_revision_report,
            'revision_goals_descrption' => $this->revision_goals_descrption,
            'revision_scope' => $this->revision_scope,
            'report_users' => $this->report_users,
            'control_system' => $this->control_system,
            'revision_plans' => $this->revision_plans,
            'deviation_reasons' => $this->deviation_reasons,
            'subjects' => $this->subjects,
            'supervisor' => $this->supervisor,
            'auditTeamHead' => $this->auditTeamHead,
            'auditTeamMembers' => $this->auditTeamMembers,
            'revision_goals' => GoalResource::collection($this->whenLoaded('goals')),
        ];
    }
}
