'use strict'
let rowId = 1;
let answersIndex = 0;
$(function(){

    // function to add new assignment
    $(document).on("click","#add_assignment", function(){
        $("#assignment").slideToggle();
    });
    // function to add question dynamically
    $(document).on("click","#add",function(){
        rowId++;
        answersIndex++;
        $("#newRow").append(`
            <div id="q${rowId}">
                <h3 id="q${rowId}-title">Question ${rowId}</h3>
                <div class="form-group">
                <label for="question${rowId}">Question</label>
                <textarea name="questions[]" id="question${rowId}" cols="10" rows="5" required></textarea>
                </div>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Answer 1</label>
                    <input type="text" name="answers[${answersIndex}][0]" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Answer 2</label>
                    <input type="text" name="answers[${answersIndex}][1]" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Answer 3</label>
                    <input type="text" name="answers[${answersIndex}][2]" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Answer 4</label>
                    <input type="text" name="answers[${answersIndex}][3]" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Correct answer</label>
                    <input type="text" name="correct[]" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Grade</label>
                    <input type="text" name="grade[]" required>
                    </div>
                </div>
                </div>
            </div>
        `)
    });
   
})