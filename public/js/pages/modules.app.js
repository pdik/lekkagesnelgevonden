/******/ (() => { // webpackBootstrap
/*!***************************************!*\
  !*** ./resources/js/pages/modules.js ***!
  \***************************************/
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/*
 *  Document   : be_pages_projects_tasks.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Project Tasks and Tasks Dashboard Page
 */
// Helper variables
var taskIdNext, tasks, taskForm, taskInput, taskInputVal, taskList, taskListStarred, taskListCompleted, taskBadge, taskBadgeStarred, taskBadgeCompleted;

var pageTasks = /*#__PURE__*/function () {
  function pageTasks() {
    _classCallCheck(this, pageTasks);
  }

  _createClass(pageTasks, null, [{
    key: "initTasks",

    /*
     * Init Tasks
     *
     */
    value: function initTasks() {
      var self = this; // Set variables

      tasks = jQuery('.js-tasks');
      taskForm = jQuery('#js-task-form');
      taskInput = jQuery('#js-task-input');
      taskList = jQuery('.js-task-list');
      taskListStarred = jQuery('.js-task-list-starred');
      taskListCompleted = jQuery('.js-task-list-completed');
      taskBadge = jQuery('.js-task-badge');
      taskBadgeStarred = jQuery('.js-task-badge-starred');
      taskBadgeCompleted = jQuery('.js-task-badge-completed'); // Set your own next new task id based on your database setup

      taskIdNext = 10; // Update badges

      this.badgesUpdate(); // New task form submission

      taskForm.on('submit', function (e) {
        e.preventDefault(); // Get input value

        taskInputVal = taskInput.prop('value'); // Check if the user entered something

        if (taskInputVal) {
          // Add Task
          self.taskAdd(taskInputVal); // Clear and focus input field

          taskInput.prop('value', '').focus();
        }
      }); // Task status update on checkbox click

      var stask, staskId;
      tasks.on('click', '.js-task-status', function (e) {
        e.preventDefault();
        stask = jQuery(e.currentTarget).closest('.js-task');
        staskId = stask.data('task-id'); // Check task status and toggle it

        if (stask.data('task-completed')) {
          self.taskSetActive(staskId);
        } else {
          self.taskSetCompleted(staskId);
        }
      }); // Task starred status update on star click

      var ftask, ftaskId;
      tasks.on('click', '.js-task-star', function (e) {
        ftask = jQuery(e.currentTarget).closest('.js-task');
        ftaskId = ftask.data('task-id'); // Check task starred status and toggle it

        if (ftask.data('task-starred')) {
          self.taskStarRemove(ftaskId);
        } else {
          self.taskStarAdd(ftaskId);
        }
      }); // Remove task on remove button click

      tasks.on('click', '.js-task-remove', function (e) {
        ftask = jQuery(e.currentTarget).closest('.js-task');
        ftaskId = ftask.data('task-id'); // Remove task

        self.taskRemove(ftaskId);
      });
    }
    /*
     * Update Badges
     *
     */

  }, {
    key: "badgesUpdate",
    value: function badgesUpdate() {
      taskBadge.text(taskList.children().length || '');
      taskBadgeStarred.text(taskListStarred.children().length || '');
      taskBadgeCompleted.text(taskListCompleted.children().length || '');
    }
    /*
     * Add a new task
     *
     */

  }, {
    key: "taskAdd",
    value: function taskAdd(taskContent) {
      // Add it to the task list
      taskList.prepend("\n            <div class=\"js-task block block-rounded mb-2 animated fadeIn\" data-task-id=\"".concat(taskIdNext, "\" data-task-completed=\"false\" data-task-starred=\"false\">\n                <table class=\"table table-borderless table-vcenter mb-0\">\n                    <tr>\n                        <td class=\"text-center pr-0\" style=\"width: 38px;\">\n                            <div class=\"js-task-status custom-control custom-checkbox custom-checkbox-rounded-circle custom-control-primary custom-control-lg\">\n                                <input type=\"checkbox\" class=\"custom-control-input\" id=\"tasks-cb-id").concat(taskIdNext, "\" name=\"tasks-cb-id").concat(taskIdNext, "\">\n                                <label class=\"custom-control-label\" for=\"tasks-cb-id").concat(taskIdNext, "\"></label>\n                            </div>\n                        </td>\n                        <td class=\"js-task-content font-w600 pl-0\">\n                            ").concat(jQuery('<span />').text(taskContent).html(), "\n                        </td>\n                        <td class=\"text-right\" style=\"width: 100px;\">\n                            <button type=\"button\" class=\"js-task-star btn btn-sm btn-link text-warning\">\n                                <i class=\"far fa-star fa-fw\"></i>\n                            </button>\n                            <button type=\"button\" class=\"js-task-remove btn btn-sm btn-link text-danger\">\n                                <i class=\"fa fa-times fa-fw\"></i>\n                            </button>\n                        </td>\n                    </tr>\n                </table>\n            </div>\n        ")); // Update badges

      this.badgesUpdate(); // Save the task based on your database setup
      // ..
      // Update task next id

      taskIdNext++;
    }
    /*
     * Remove a task
     *
     */

  }, {
    key: "taskRemove",
    value: function taskRemove(taskId) {
      jQuery('.js-task[data-task-id="' + taskId + '"]').remove(); // Update badges

      this.badgesUpdate(); // Remove the task based on your database setup
      // ..
    }
    /*
     * Star a task
     *
     */

  }, {
    key: "taskStarAdd",
    value: function taskStarAdd(taskId) {
      var task = jQuery('.js-task[data-task-id="' + taskId + '"]'); // Check if exists and update accordignly the markup

      if (task.length > 0) {
        task.data('task-starred', true);
        task.find('.js-task-star > i').toggleClass('fa far');

        if (!task.data('task-completed')) {
          task.prependTo(taskListStarred);
        } // Update badges


        this.badgesUpdate(); // Star the task based on your database setup
        // ..
      }
    }
    /*
     * Unstar a task
     *
     */

  }, {
    key: "taskStarRemove",
    value: function taskStarRemove(taskId) {
      var task = jQuery('.js-task[data-task-id="' + taskId + '"]'); // Check if exists and update accordignly the markup

      if (task.length > 0) {
        task.data('task-starred', false);
        task.find('.js-task-star > i').toggleClass('fa far');

        if (!task.data('task-completed')) {
          task.prependTo(taskList);
        } // Update badges


        this.badgesUpdate(); // Unstar the task based on your database setup
        // ..
      }
    }
    /*
     * Set a task to active
     *
     */

  }, {
    key: "taskSetActive",
    value: function taskSetActive(taskId) {
      var task = jQuery('.js-task[data-task-id="' + taskId + '"]'); // Check if exists and update accordignly

      if (task.length > 0) {
        task.data('task-completed', false);
        task.find('.table').toggleClass('bg-body');
        task.find('.js-task-status > input').prop('checked', false);
        task.find('.js-task-content > del').contents().unwrap();

        if (task.data('task-starred')) {
          task.prependTo(taskListStarred);
        } else {
          task.prependTo(taskList);
        } // Update badges


        this.badgesUpdate(); // Update task status based on your database setup
        // ..
      }
    }
    /*
     * Set a task to completed
     *
     */

  }, {
    key: "taskSetCompleted",
    value: function taskSetCompleted(taskId) {
      var task = jQuery('.js-task[data-task-id="' + taskId + '"]'); // Check if exists and update accordignly

      if (task.length > 0) {
        task.data('task-completed', true);
        task.find('.table').toggleClass('bg-body');
        task.find('.js-task-status > input').prop('checked', true);
        task.find('.js-task-content').wrapInner('<del></del>');
        task.prependTo(taskListCompleted); // Update badges

        this.badgesUpdate(); // Update task status based on your database setup
        // ..
      }
    }
    /*
     * Init functionality
     *
     */

  }, {
    key: "init",
    value: function init() {
      this.initTasks();
    }
  }]);

  return pageTasks;
}(); // Initialize when page loads


jQuery(function () {
  pageTasks.init();
});
/******/ })()
;