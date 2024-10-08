<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Upload_Languages extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('isLoggedIn')) {
            redirect('/');
        }
        $this->load->config('quiz');
        date_default_timezone_set(get_system_timezone());

        $this->category_type = $this->config->item('category_type');
    }

    public function index()
    {
        if (!$this->session->userdata('isLoggedIn')) {
            redirect('/');
        } else {
            if (!$this->session->userdata('authStatus')) {
                redirect('/');
            } else {
                if ($this->input->post('btnadd')) {
                    if (!has_permissions('create', 'upload_languages')) {
                        $this->session->set_flashdata('error', PERMISSION_ERROR_MSG);
                    } else {
                        $this->Upload_Languages_model->add_data();
                        $this->session->set_flashdata('success', 'Data Inserted successfully.!');
                    }
                    redirect('upload-languages', 'refresh');
                }
            }

            if ($this->input->post('btnupdate')) {
                if (!has_permissions('create', 'upload_languages')) {
                    $this->session->set_flashdata('error', PERMISSION_ERROR_MSG);
                } else {
                    $this->Upload_Languages_model->update_data();
                    $this->session->set_flashdata('success', 'Data updated successfully.!');
                }
                redirect('upload-languages', 'refresh');
            }
            $this->load->view('upload_languages', $this->result);
        }
    }
    public function delete_language_data()
    {
        if (!has_permissions('delete', 'upload_languages')) {
            echo FALSE;
        } else {
            $id = $this->input->post('id');
            $file_url = $this->input->post('file_url');

            $this->Upload_Languages_model->delete_data($id, $file_url);
            echo TRUE;
        }
        redirect('upload-languages', 'refresh');
    }
}
