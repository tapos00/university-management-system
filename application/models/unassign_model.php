<?php

class Unassign_model extends CI_Model {

    public function unassignCourses() {
        $data = array(
            'status' => 0
        );

        $this->db->where('status', 1);
        $this->db->update('assing_course', $data);
    }

}
