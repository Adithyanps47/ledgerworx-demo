<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LedgerWorx – Tasks</title>

<style>
/* ===== GLOBAL ===== */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: "Segoe UI", -apple-system, BlinkMacSystemFont, sans-serif;
  background: linear-gradient(135deg, #f0f4f8 0%, #e8f1f8 100%);
  color: #1f2937;
  min-height: 100vh;
}

/* ===== NAVBAR ===== */
.navbar {
  background: linear-gradient(90deg, #0b3e66 0%, #1a5a8f 100%);
  color: white;
  padding: 12px 40px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  box-shadow: 0 4px 20px rgba(11, 62, 102, 0.15);
  position: sticky;
  top: 0;
  z-index: 100;
}

.nav-left {
  font-weight: 700;
  font-size: 20px;
}

.nav-center {
  display: flex;
  gap: 30px;
}

.nav-center a {
  color: rgba(255, 255, 255, 0.85);
  text-decoration: none;
  font-size: 14px;
  font-weight: 500;
  transition: all 0.3s ease;
  position: relative;
}

.nav-center a::after {
  content: '';
  position: absolute;
  bottom: -4px;
  left: 0;
  width: 0;
  height: 2px;
  background: #4da3ff;
  transition: width 0.3s ease;
}

.nav-center a:hover::after,
.nav-center a.active::after {
  width: 100%;
}

.nav-center a:hover,
.nav-center a.active {
  color: white;
}

.nav-right {
  display: flex;
  align-items: center;
  gap: 20px;
  font-size: 14px;
  font-weight: 500;
}

.notification-icon {
  position: relative;
  cursor: pointer;
  font-size: 20px;
}

.notification-badge {
  position: absolute;
  top: -8px;
  right: -8px;
  background: #ef4444;
  color: white;
  border-radius: 50%;
  width: 20px;
  height: 20px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 11px;
  font-weight: bold;
}

/* ===== LAYOUT ===== */
.container {
  padding: 40px;
  max-width: 1600px;
  margin: 0 auto;
}

.page-header {
  margin-bottom: 30px;
}

.page-header h1 {
  font-size: 32px;
  color: #0b3e66;
  margin-bottom: 12px;
  font-weight: 700;
}

/* ===== TABS ===== */
.tabs {
  display: flex;
  gap: 0;
  margin-bottom: 25px;
  border-bottom: 2px solid #e5e7eb;
}

.tabs span {
  cursor: pointer;
  color: #64748b;
  padding: 12px 20px;
  border-bottom: 3px solid transparent;
  font-weight: 600;
  font-size: 14px;
  transition: all 0.3s ease;
  margin-bottom: -2px;
}

.tabs span:hover {
  color: #0b3e66;
}

.tabs span.active {
  color: #0b3e66;
  border-bottom-color: #0b3e66;
}

/* ===== CONTROLS ===== */
.controls {
  display: flex;
  gap: 12px;
  margin-bottom: 25px;
  flex-wrap: wrap;
  align-items: center;
}

.controls input,
.controls select {
  padding: 10px 14px;
  border: 1px solid #cbd5e0;
  border-radius: 8px;
  font-size: 13px;
  font-family: inherit;
}

.controls input {
  flex: 1;
  min-width: 200px;
}

.btn {
  background: linear-gradient(90deg, #1a5a8f 0%, #0b3e66 100%);
  color: white;
  border: none;
  padding: 10px 16px;
  border-radius: 8px;
  cursor: pointer;
  font-weight: 600;
  font-size: 13px;
  transition: all 0.3s ease;
  box-shadow: 0 2px 8px rgba(26, 90, 143, 0.2);
}

.btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 4px 16px rgba(26, 90, 143, 0.3);
}

/* ===== TABLE ===== */
.table-card {
  background: white;
  border-radius: 14px;
  overflow: hidden;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
  animation: slideUp 0.5s ease-out;
}

table {
  width: 100%;
  border-collapse: collapse;
}

thead {
  background: linear-gradient(90deg, #f0f4f8 0%, #e8f1f8 100%);
  border-bottom: 2px solid #cbd5e0;
}

th {
  padding: 16px 14px;
  text-align: left;
  font-weight: 600;
  color: #0b3e66;
  font-size: 13px;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

td {
  padding: 16px 14px;
  border-bottom: 1px solid #e5e7eb;
  font-size: 14px;
}

tbody tr {
  transition: all 0.3s ease;
}

tbody tr:hover {
  background: rgba(26, 90, 143, 0.04);
}

.task-item {
  display: flex;
  align-items: center;
  gap: 12px;
}

.task-icon {
  width: 40px;
  height: 40px;
  border-radius: 8px;
  background: linear-gradient(135deg, #1a5a8f, #0b3e66);
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: bold;
  font-size: 16px;
}

.badge {
  padding: 6px 12px;
  border-radius: 20px;
  font-size: 12px;
  color: white;
  font-weight: 600;
  display: inline-block;
  transition: all 0.3s ease;
}

.followup { background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%); color: #991b1b; }
.proposal { background: linear-gradient(135deg, #fef3c7 0%, #fef9e7 100%); color: #92400e; }
.other { background: linear-gradient(135deg, #e5e7eb 0%, #d1d5db 100%); color: #374151; }

.owner {
  display: flex;
  align-items: center;
  gap: 8px;
}

.owner-avatar {
  width: 32px;
  height: 32px;
  border-radius: 50%;
  background: linear-gradient(135deg, #1a5a8f, #0b3e66);
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: bold;
  font-size: 12px;
}

.owner-name {
  font-weight: 500;
  color: #0b3e66;
}

/* ===== ACTIONS MENU ===== */
.actions {
  cursor: pointer;
  position: relative;
  text-align: center;
  color: #64748b;
}

.menu {
  display: none;
  position: absolute;
  right: 0;
  top: 25px;
  background: white;
  border-radius: 8px;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
  width: 180px;
  z-index: 10;
}

.menu div {
  padding: 12px 14px;
  cursor: pointer;
  font-size: 13px;
  color: #404e5c;
  transition: all 0.3s ease;
  border-bottom: 1px solid #f0f4f8;
}

.menu div:last-child {
  border-bottom: none;
}

.menu div:hover {
  background: linear-gradient(90deg, #f0f4f8 0%, #e8f1f8 100%);
  color: #0b3e66;
  padding-left: 18px;
}

/* ===== FOOTER ===== */
.table-footer {
  padding: 16px 24px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  color: #64748b;
  font-size: 13px;
  border-top: 1px solid #e5e7eb;
  background: linear-gradient(90deg, #f9fafb 0%, #f3f4f6 100%);
}

/* ===== ANIMATIONS ===== */
@keyframes slideUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* ===== RESPONSIVE ===== */
@media (max-width: 768px) {
  .navbar {
    flex-direction: column;
    gap: 12px;
    padding: 12px 20px;
  }

  .nav-center {
    gap: 15px;
    font-size: 12px;
  }

  .container {
    padding: 20px;
  }

  .controls {
    flex-direction: column;
  }

  .controls input {
    min-width: 100%;
  }

  table {
    font-size: 12px;
  }

  th, td {
    padding: 10px;
  }

  .task-item {
    flex-direction: column;
    align-items: flex-start;
  }
}
</style>
</head>

<body>

<!-- Navbar -->
<div class="navbar">
  <div class="nav-left" style="display: flex; align-items: center; gap: 12px; cursor: pointer;" onclick="window.location.href='sales-dashboard.php'">
    <img src="logo-removebg-preview.png" alt="LedgerWorx" style="height: 45px; width: auto;">
  </div>
  <div class="nav-center">
    <a href="sales-dashboard.php">Dashboard</a>
    <a href="sales-leads.php">Leads</a>
    <a href="sales-tasks.php" class="active">Tasks</a>
    <a href="sales-reports.php">Reports</a>
    <a href="sales-notifications.php">Notifications</a>
  </div>
  <div class="nav-right">
    <div class="notification-icon">
      🔔
      <span class="notification-badge">3</span>
    </div>
    <div>John Carter</div>
  </div>
</div>

<div class="container">

  <!-- PAGE HEADER -->
  <div class="page-header">
    <h1>Tasks</h1>
  </div>

  <!-- TABS -->
  <div class="tabs">
    <span class="active" onclick="filterTasks('today', this)">Today</span>
    <span onclick="filterTasks('overdue', this)">Overdue</span>
    <span onclick="filterTasks('upcoming', this)">Upcoming</span>
    <span onclick="filterTasks('completed', this)">Completed</span>
  </div>

  <!-- CONTROLS -->
  <div class="controls">
    <input type="text" id="searchInput" placeholder="🔍 Search tasks..." onkeyup="searchTasks()">
    <select id="dateFilter" onchange="filterByDate(this.value)">
      <option value="">All Dates</option>
      <option value="today">Today</option>
      <option value="week">This Week</option>
      <option value="month">This Month</option>
    </select>
    <select id="ownerFilter" onchange="filterByOwner(this.value)">
      <option value="">All Team Members</option>
      <option value="Sarah Malik">Sarah Malik</option>
      <option value="John Carter">John Carter</option>
      <option value="Emma Johnson">Emma Johnson</option>
      <option value="Mark D'Souza">Mark D'Souza</option>
    </select>
    <button class="btn" onclick="openAddTaskModal()">+ Add Task</button>
  </div>

  <!-- TABLE -->
  <div class="table-card">
    <table class="tasks-table">
      <thead>
        <tr>
          <th><input type="checkbox"></th>
          <th>Task</th>
          <th>Related Lead</th>
          <th>Due Date</th>
          <th>Owner</th>
          <th></th>
        </tr>
      </thead>
      <tbody id="tasksTable">

      </tbody>
    </table>

    <div class="table-footer">
      <span id="taskCount">0 tasks</span>
      <span>‹ ›</span>
    </div>
  </div>

</div>

<script>
let allTasks = [
  { id: 1, title: "Follow up with XYZ Technologies", badge: "Follow-Up", lead: "XYZ Technologies", dueDate: "Today, 2:00 PM", owner: "Sarah Malik", ownerInitials: "SM", priority: "high", status: "today" },
  { id: 2, title: "Send proposal to Rashid Ali", badge: "Send Proposal", lead: "Rashid Ali", dueDate: "Today, 4:00 PM", owner: "John Carter", ownerInitials: "JC", priority: "high", status: "today" },
  { id: 3, title: "Call Global Solutions for demo", badge: "Follow-Up", lead: "Global Solutions", dueDate: "Tomorrow, 10:00 AM", owner: "Emma Johnson", ownerInitials: "EJ", priority: "medium", status: "upcoming" },
  { id: 4, title: "Assign service to Nadia Trading", badge: "Assign Service", lead: "Nadia Trading", dueDate: "Apr 28, 2024", owner: "Mark D'Souza", ownerInitials: "MD", priority: "medium", status: "upcoming" },
  { id: 5, title: "Invoice follow-up: ABC Corp", badge: "Follow-Up", lead: "ABC Corporation", dueDate: "Apr 27, 2024 (OVERDUE)", owner: "John Carter", ownerInitials: "JC", priority: "urgent", status: "overdue" },
  { id: 6, title: "Complete Ahmed Khan contract", badge: "Proposal", lead: "Ahmed Khan", dueDate: "Apr 26, 2024 (OVERDUE)", owner: "Sarah Malik", ownerInitials: "SM", priority: "urgent", status: "overdue" },
  { id: 7, title: "Schedule follow-up with Maria Lopez", badge: "Follow-Up", lead: "Maria Lopez", dueDate: "May 2, 2024", owner: "John Carter", ownerInitials: "JC", priority: "low", status: "upcoming" },
  { id: 8, title: "Tech Innovations - Send quote", badge: "Send Proposal", lead: "Tech Innovations", dueDate: "Apr 30, 2024", owner: "Emma Johnson", ownerInitials: "EJ", priority: "medium", status: "upcoming" }
];

let filteredTasks = [...allTasks];

function renderTasks(tasks) {
  const tbody = document.getElementById('tasksTable');
  tbody.innerHTML = '';

  if (tasks.length === 0) {
    tbody.innerHTML = '<tr><td colspan="6" style="text-align: center; padding: 40px; color: #64748b;">No tasks found</td></tr>';
    return;
  }

  // Group tasks by status
  const grouped = {
    today: tasks.filter(t => t.status === 'today'),
    overdue: tasks.filter(t => t.status === 'overdue'),
    upcoming: tasks.filter(t => t.status === 'upcoming'),
    completed: tasks.filter(t => t.status === 'completed')
  };

  let html = '';

  // Overdue tasks
  if (grouped.overdue.length > 0) {
    html += `<tr style="background: #fee2e2; font-weight: 600; color: #991b1b;"><td colspan="6" style="padding: 12px 14px; border-bottom: 2px solid #fecaca;">⚠️ OVERDUE TASKS (${grouped.overdue.length})</td></tr>`;
    grouped.overdue.forEach(task => {
      html += generateTaskRow(task);
    });
  }

  // Today's tasks
  if (grouped.today.length > 0) {
    html += `<tr style="background: #dbeafe; font-weight: 600; color: #1e40af;"><td colspan="6" style="padding: 12px 14px; border-bottom: 2px solid #93c5fd;">📅 TODAY (${grouped.today.length})</td></tr>`;
    grouped.today.forEach(task => {
      html += generateTaskRow(task);
    });
  }

  // Upcoming tasks
  if (grouped.upcoming.length > 0) {
    html += `<tr style="background: #fef3c7; font-weight: 600; color: #92400e;"><td colspan="6" style="padding: 12px 14px; border-bottom: 2px solid #fcd34d;">📆 UPCOMING (${grouped.upcoming.length})</td></tr>`;
    grouped.upcoming.forEach(task => {
      html += generateTaskRow(task);
    });
  }

  tbody.innerHTML = html;
}

function generateTaskRow(task) {
  const priorityColors = {
    urgent: '#fee2e2',
    high: '#fef3c7',
    medium: '#dbeafe',
    low: '#d1fae5'
  };

  const priorityBorder = {
    urgent: '#ef4444',
    high: '#f59e0b',
    medium: '#3b82f6',
    low: '#16a34a'
  };

  return `
    <tr>
      <td><input type="checkbox"></td>
      <td>
        <div class="task-item">
          <div class="task-icon" style="background: ${priorityColors[task.priority]}; color: ${priorityBorder[task.priority]}; border-left: 3px solid ${priorityBorder[task.priority]};">
            ${task.id}
          </div>
          <div>
            <strong style="color: #0b3e66; display: block; margin-bottom: 4px;">${task.title}</strong>
            <span class="badge ${task.badge.toLowerCase().replace(' ', '')}">${task.badge}</span>
          </div>
        </div>
      </td>
      <td style="color: #404e5c; font-weight: 500; font-size: 13px;">${task.lead}</td>
      <td style="color: ${task.status === 'overdue' ? '#991b1b' : '#64748b'}; font-size: 13px; font-weight: ${task.status === 'overdue' ? '600' : '400'};">${task.dueDate}</td>
      <td>
        <div class="owner">
          <div class="owner-avatar">${task.ownerInitials}</div>
          <span class="owner-name">${task.owner}</span>
        </div>
      </td>
      <td class="actions" onclick="toggleMenu(${task.id})">⋮
        <div class="menu" id="menu-${task.id}">
          <div onclick="markCompleted(${task.id})">✔ Mark as Completed</div>
          <div onclick="rescheduleTask(${task.id})">🕒 Reschedule</div>
          <div onclick="viewLead('${task.lead}')">👁 View Lead</div>
          <div onclick="addNote(${task.id})">📝 Add Note</div>
          <div onclick="editTask(${task.id})">✏️ Edit Task</div>
        </div>
      </td>
    </tr>
  `;
}

function filterTasks(type, el) {
  document.querySelectorAll(".tabs span").forEach(s => s.classList.remove("active"));
  el.classList.add("active");

  if (type === 'today') {
    filteredTasks = allTasks.filter(t => t.status === 'today');
  } else if (type === 'overdue') {
    filteredTasks = allTasks.filter(t => t.status === 'overdue');
  } else if (type === 'upcoming') {
    filteredTasks = allTasks.filter(t => t.status === 'upcoming');
  } else if (type === 'completed') {
    filteredTasks = allTasks.filter(t => t.status === 'completed');
  } else {
    filteredTasks = [...allTasks];
  }

  applyAllFilters();
}

function searchTasks() {
  const query = document.getElementById("searchInput").value.toLowerCase();
  applyAllFilters();
}

function filterByDate(value) {
  applyAllFilters();
}

function filterByOwner(owner) {
  applyAllFilters();
}

function applyAllFilters() {
  let result = [...allTasks];
  const searchQuery = document.getElementById("searchInput").value.toLowerCase();
  const ownerFilter = document.getElementById("ownerFilter").value;

  if (searchQuery) {
    result = result.filter(t => 
      t.title.toLowerCase().includes(searchQuery) || 
      t.lead.toLowerCase().includes(searchQuery)
    );
  }

  if (ownerFilter) {
    result = result.filter(t => t.owner === ownerFilter);
  }

  renderTasks(result);
}

function toggleMenu(i) {
  document.querySelectorAll(".menu").forEach(m => m.style.display = "none");
  document.getElementById("menu-" + i).style.display = "block";
}

function markCompleted(id) {
  const task = allTasks.find(t => t.id === id);
  if (task) {
    task.status = 'completed';
    applyAllFilters();
    alert('✓ Task marked as completed!');
  }
  closeMenus();
}

function rescheduleTask(id) {
  alert('🕒 Reschedule feature coming soon!');
  closeMenus();
}

function viewLead(leadName) {
  window.location.href = 'sales-leads.php';
  closeMenus();
}

function addNote(id) {
  alert('📝 Add note feature coming soon!');
  closeMenus();
}

function editTask(id) {
  alert('✏️ Edit task feature coming soon!');
  closeMenus();
}

function openAddTaskModal() {
  alert('➕ Add task modal coming soon!');
}

function closeMenus() {
  document.querySelectorAll(".menu").forEach(m => m.style.display = "none");
}

// Close menu when clicking elsewhere
document.addEventListener('click', function(event) {
  if (!event.target.closest('.actions')) {
    closeMenus();
  }
});

// Initialize
renderTasks(allTasks);
</script>

</body>
</html>
