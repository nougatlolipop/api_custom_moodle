<?php
require_once("$CFG->libdir/externallib.php");

class local_customquestionapi_external extends external_api
{

    // Parameter input.
    public static function get_questions_parameters()
    {
        return new external_function_parameters([
            'courseid' => new external_value(PARAM_INT, 'ID of the course'),
        ]);
    }

    // Logika fungsi utama.
    public static function get_questions($courseid)
    {
        global $DB;

        // Validasi parameter.
        $params = self::validate_parameters(self::get_questions_parameters(), ['courseid' => $courseid]);

        // Ambil data question dari tabel.
        $questions = $DB->get_records('question', ['courseid' => $params['courseid']]);

        // Format output.
        $result = [];
        foreach ($questions as $q) {
            $result[] = [
                'id' => $q->id,
                'name' => $q->name,
            ];
        }

        return $result;
    }

    // Struktur output.
    public static function get_questions_returns()
    {
        return new external_multiple_structure(
            new external_single_structure([
                'id'   => new external_value(PARAM_INT, 'Question ID'),
                'name' => new external_value(PARAM_TEXT, 'Question name'),
            ])
        );
    }
}
