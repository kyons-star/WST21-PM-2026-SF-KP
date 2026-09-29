# Personal Task Manager

A simple Personal Task Manager built using Laravel and MySQL. The system allows users to create, view, edit, delete, and update the status of their personal tasks.

---

## Project Information

**Project Code:** WST21-PM-2026-SF  
**Student Name:** Pilande, Kian Jay M.  
**Course & Year:** BSIT 2 - SECTION 3  
**Database Used:** MySQL

---

## Project Overview

The **Personal Task Manager** is a Laravel-based web application designed to help users manage their personal tasks.

Users can:

- Add new tasks
- View existing tasks
- Edit task information
- Delete tasks
- Update task status
- Set a due date
- View the total number of tasks
- View pending tasks
- View completed tasks

---

## Features

### Add Task
Users can create a new task by entering:

- Task Name
- Description
- Status
- Due Date

### View Tasks
Users can view all their created tasks and see their:

- Task Name
- Description
- Status
- Due Date

### Edit Task
Users can edit the information of an existing task.

### Delete Task
Users can delete an existing task from the task list.

### Update Status
Users can update the status of a task between:

- Pending
- Completed

### Task Dashboard
The dashboard displays:

- Total Tasks
- Pending Tasks
- Completed Tasks

---

# Example: Add Task to Update Status

The following demonstrates the basic workflow of the Personal Task Manager.

## 1. Home / Dashboard

The dashboard displays the task statistics and the task management interface.

![Home Dashboard](screenshots/home.png)

---

## 2. Add a New Task

The user enters the task name, description, status, and due date.

Example:

**Task Name:** Finish Laravel Project  
**Description:** Complete the Personal Task Manager  
**Status:** Pending  
**Due Date:** 25/09/2026

![Add Task](screenshots/add%20task.png)

After completing the form, the user clicks **+ Add Task**.

---

## 3. View the Updated Task

After adding the task, it appears in the **My Tasks** section.

The task displays its name, description, status, and due date.

![Updated Task](screenshots/updated%20task.png)

---

## 4. Edit Task

The user can click the **Edit** button to modify the task information.

The task name, description, status, and due date can be changed.

![Edit Task](screenshots/edit.png)

---

## 5. Update Task Status

The status of the task can be changed from **Pending** to **Completed**.

The user can update the status using the status dropdown or through the Edit Task page.

![Updated Status](screenshots/updated.png)

---

## 6. Delete Task

The user can click the **Delete** button to remove a task.

A confirmation message appears before the task is deleted.

![Delete Task](screenshots/delete.png)

---

# CRUD Operations

The Personal Task Manager demonstrates the four basic CRUD operations.

| CRUD Operation | Function |
|---|---|
| **Create** | Add a new task |
| **Read** | View existing tasks |
| **Update** | Edit task details and update status |
| **Delete** | Delete a task |

---

# Task Status

The application supports two task statuses:

| Status | Description |
|---|---|
| **Pending** | The task still needs to be completed. |
| **Completed** | The task has already been finished. |

---

# Database

The application uses **MySQL** as its database.

The `tasks` table contains the following fields:

| Field | Description |
|---|---|
| `id` | Unique task ID |
| `task_name` | Name of the task |
| `description` | Description of the task |
| `status` | Current task status |
| `due_date` | Task deadline |
| `created_at` | Date and time the task was created |
| `updated_at` | Date and time the task was updated |

---

# Technologies Used

- **Laravel** – PHP web framework
- **PHP** – Backend programming language
- **Blade** – Laravel templating engine
- **MySQL** – Database
- **HTML** – Page structure
- **CSS** – Page styling
- **JavaScript** – Client-side functionality

---

# Laravel Project Structure

The project follows the Laravel architecture:

```text
Routes
   ↓
Controller
   ↓
Model
   ↓
Database
   ↓
Controller
   ↓
Blade Views
   ↓
User Interface
