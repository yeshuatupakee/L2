// Maintenance page scripts (UI only)

document.addEventListener('DOMContentLoaded', () => {
  const maintenanceSearch = document.getElementById('searchMaintenance');
  if (maintenanceSearch) {
    maintenanceSearch.addEventListener('input', function() {
      const term = this.value.toLowerCase();
      document.querySelectorAll('#maintenanceTable tbody tr').forEach(row => {
        row.style.display = row.textContent.toLowerCase().includes(term) ? '' : 'none';
      });
    });
  }

  // Add form stub
  const addForm = document.getElementById('addMaintenanceForm');
  if (addForm) {
    addForm.addEventListener('submit', function(e) {
      e.preventDefault();
      const modal = bootstrap.Modal.getInstance(document.getElementById('addMaintenanceModal'));
      if (modal) modal.hide();
      alert('Maintenance added (demo). Connect to backend to persist.');
    });
  }
});

