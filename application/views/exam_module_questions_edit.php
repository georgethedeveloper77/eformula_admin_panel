<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Questions for Exam Module | <?php echo (is_settings('app_name')) ? is_settings('app_name') : "" ?></title>

    <?php base_url() . include 'include.php'; ?>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <?php base_url() . include 'header.php'; ?>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Create and Manage Questions for Exam Module</h1>
                    </div>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Edit Questions </h4>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" class="needs-validation" novalidate="" enctype="multipart/form-data">
                                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                            <input type="hidden" id="exam_module_id" name="exam_module_id" value="<?= $this->uri->segment(2) ?>" />
                                            <?php
                                            $question_id = $this->uri->segment(2);
                                            $sess_question_type = (!empty($data)) ? $data[0]->question_type : "";
                                            ?>
                                            <?php if ($question_id != '') { ?>
                                                <input type="hidden" id="edit_id" name="edit_id" required value="<?= $question_id ?>" aria-required="true">
                                                <input type="hidden" id="image_url" name="image_url" value="<?= ($question_id != '') ? ((!empty($data)) ? (($data[0]->image != '') ? EXAM_QUESTION_IMG_PATH . $data[0]->image : '') : '') : '' ?>">
                                                <input type="hidden" id="question_type" name="question_type" value="<?= ($sess_question_type != '') ? $sess_question_type : '' ?>">
                                            <?php } ?>

                                            <div class="form-group row">
                                                <div class="col-md-12 col-sm-12">
                                                    <label class="control-label">Question</label>
                                                    <textarea id="question" name="question" class="form-control" required><?= ($question_id != '') ? ((!empty($data)) ? $data[0]->question : '') : '' ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6 col-sm-12">
                                                    <label class="control-label">Image for Question <small>( if any )</small></label>
                                                    <input id="file" name="update_file" type="file" accept="image/*" class="form-control">
                                                    <small class="text-danger">Image type supported (png, jpg and jpeg)</small>
                                                    <p style="display: none" id="img_error_msg" class="badge badge-danger"></p>
                                                    <?php if ($question_id != '' && isset($data[0]->image) && !empty($data[0]->image)) { ?>
                                                        <div class="m-2"><img src="<?= base_url() . EXAM_QUESTION_IMG_PATH . $data[0]->image ?>" alt="logo" width="40" height="40"></div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6 col-sm-6">
                                                    <label class="control-label">Option A</label>
                                                    <textarea class="form-control" id="a" name="a" required><?= ($question_id !=  '') ? ((!empty($data)) ? $data[0]->optiona : '') : '' ?></textarea>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <label class="control-label">Option B</label>
                                                    <textarea class="form-control" id="b" name="b" required><?= ($question_id !=  '') ? ((!empty($data)) ? $data[0]->optionb : '') : '' ?></textarea>
                                                </div>
                                            </div>
                                            <div id="tf">
                                                <div class="form-group row">
                                                    <div class="col-md-6 col-sm-6">
                                                        <label class="control-label">Option C</label>
                                                        <textarea class="form-control" id="c" name="c" required><?= ($question_id !=  '') ? ((!empty($data)) ? $data[0]->optionc : '') : '' ?></textarea>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <label class="control-label">Option D</label>
                                                        <textarea class="form-control" id="d" name="d" required><?= ($question_id !=  '') ? ((!empty($data)) ? $data[0]->optiond : '') : '' ?></textarea>
                                                    </div>
                                                </div>
                                                <?php if (is_option_e_mode_enabled()) { ?>
                                                    <div class="form-group row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <label class="control-label">Option E</label>
                                                            <textarea class="form-control" id="e" name="e" required><?= ($question_id !=  '') ? ((!empty($data)) ? $data[0]->optione : '') : '' ?></textarea>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6 col-sm-12">
                                                    <label class="control-label">Answer</label>
                                                    <select name='answer' id='answer' class='form-control' required>
                                                        <option value=''>Select Right Answer</option>
                                                        <option value='a' <?= ($question_id !=  '') ? ((!empty($data)) ? (($data[0]->answer == 'a') ? 'selected' : '') : '') : '' ?>>A</option>
                                                        <option value='b' <?= ($question_id !=  '') ? ((!empty($data)) ? (($data[0]->answer == 'b') ? 'selected' : '') : '') : '' ?>>B</option>
                                                        <option class='ntf' value='c' <?= ($question_id !=  '') ? ((!empty($data)) ? (($data[0]->answer == 'c') ? 'selected' : '') : '') : '' ?>>C</option>
                                                        <option class='ntf' value='d' <?= ($question_id !=  '') ? ((!empty($data)) ? (($data[0]->answer == 'd') ? 'selected' : '') : '') : '' ?>>D</option>
                                                        <?php if (is_option_e_mode_enabled()) { ?>
                                                            <option class='ntf' value='e' <?= ($question_id !=  '') ? ((!empty($data)) ? (($data[0]->answer == 'e') ? 'selected' : '') : '') : '' ?>>E</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <label class="control-label"></label>
                                                    <input name="marks" type="number" min="1" class="form-control" required placeholder="Enter Mark" value="<?= ($question_id !=  '') ? (!empty($data) ? $data[0]->marks : '') : '' ?>" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <input type="submit" name="btnupdate" value="Submit" class="<?= BUTTON_CLASS ?>" />
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <?php base_url() . include 'footer.php'; ?>

    <?php if (is_settings('exam_latex_mode')) {
        base_url(include 'ckeditor.php');
    ?>
        <script type="text/javascript">
            if (!<?= json_encode($question_id) ?>) {
                ckeditor_initialize('', false);
            }
        </script>

    <?php } ?>

    <script type="text/javascript">
        $('#filter_btn').on('click', function(e) {
            $('#question_list').bootstrapTable('refresh');
        });
        $('#delete_multiple_questions').on('click', function(e) {
            var base_url = "<?php echo base_url(); ?>";
            sec = 'tbl_exam_module_question';
            is_image = 1;
            table = $('#question_list');
            delete_button = $('#delete_multiple_questions');
            selected = table.bootstrapTable('getSelections');
            ids = "";
            $.each(selected, function(i, e) {
                ids += e.id + ",";
            });
            ids = ids.slice(0, -1);
            if (ids == "") {
                alert("Please select some questions to delete!");
            } else {
                if (confirm("Are you sure you want to delete all selected questions?")) {
                    $.ajax({
                        type: "POST",
                        url: base_url + 'delete_multiple',
                        data: 'ids=' + ids + '&sec=' + sec + '&is_image=' + is_image,
                        beforeSend: function() {
                            delete_button.html('<i class="fa fa-spinner fa-pulse"></i>');
                        },
                        success: function(result) {
                            if (result == 1) {
                                alert("Questions deleted successfully");
                            } else {
                                alert("Could not delete Questions. Try again!");
                            }
                            delete_button.html('<i class="fa fa-trash"></i>');
                            table.bootstrapTable('refresh');
                        }
                    });
                }
            }
        });
    </script>

    <script type="text/javascript">
        $(document).on('click', '.delete-data', function() {
            if (confirm('Are you sure? Want to delete question?')) {
                var base_url = "<?php echo base_url(); ?>";
                id = $(this).data("id");
                image = $(this).data("image");
                $.ajax({
                    url: base_url + 'delete_exam_module_questions',
                    type: "POST",
                    data: 'id=' + id + '&image_url=' + image,
                    success: function(result) {
                        if (result) {
                            $('#question_list').bootstrapTable('refresh');
                        } else {
                            var PERMISSION_ERROR_MSG = "<?= PERMISSION_ERROR_MSG; ?>";
                            ErrorMsg(PERMISSION_ERROR_MSG);
                        }
                    }
                });
            }
        });
    </script>

    <script type="text/javascript">
        function queryParams(p) {
            return {
                "exam_module_id": $('#exam_module_id').val(),
                sort: p.sort,
                order: p.order,
                offset: p.offset,
                limit: p.limit,
                search: p.search
            };
        }
    </script>

    <script type="text/javascript">
        function questionType2Setting() {
            $('#tf').hide('fast');
            $('#c').removeAttr('required');
            $('#d').removeAttr('required');
            $('#e').removeAttr('required');
            $('.ntf').hide('fast');
            if (<?= is_settings('exam_latex_mode') ?>) {
                $(document).ready(function() {
                    ckeditor_initialize(2, false);
                });
            }
        }

        function questionType1Setting() {
            $('#tf').show('fast');
            $('.ntf').show('fast');
            $('#c').attr("required", "required");
            $('#d').attr("required", "required");
            $('#e').attr("required", "required");

            if (<?= is_settings('exam_latex_mode') ?>) {
                $(document).ready(function() {
                    ckeditor_initialize(1, false);
                });
            }
        }

        $('input[name="question_type"]').on("click", function(e) {
            var question_type = $(this).val();
            if (question_type == "2") {
                $('#answer').val('');
                questionType2Setting()
            } else {
                $('#answer').val('');
                questionType1Setting()
            }
        });

        if (<?= json_encode($question_id) ?>) {
            var question_type = "<?= $sess_question_type ?>"
            if (question_type == "2") {
                questionType2Setting()
            } else {
                questionType1Setting()
            }
        }
    </script>

    <script type="text/javascript">
        var _URL = window.URL || window.webkitURL;

        $("#file").change(function(e) {
            var file, img;

            if ((file = this.files[0])) {
                img = new Image();
                img.onerror = function() {
                    $('#file').val('');
                    $('#img_error_msg').html('<?= INVALID_IMAGE_TYPE; ?>');
                    $('#img_error_msg').show().delay(3000).fadeOut();
                };
                img.src = _URL.createObjectURL(file);
            }
        });

        $("#update_file").change(function(e) {
            var file, img;

            if ((file = this.files[0])) {
                img = new Image();
                img.onerror = function() {
                    $('#update_file').val('');
                    $('#up_img_error_msg').html('<?= INVALID_IMAGE_TYPE; ?>');
                    $('#up_img_error_msg').show().delay(3000).fadeOut();
                };
                img.src = _URL.createObjectURL(file);
            }
        });
    </script>

</body>

</html>