// Vehicle Request Page Scripts

(function() {
  document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('requestVehicleForm');
    if (!form) return;

    const fromDate = document.getElementById('rvFromDate');
    const toDate = document.getElementById('rvToDate');

    // Keep To Date >= From Date
    if (fromDate && toDate) {
      fromDate.addEventListener('change', function() {
        if (fromDate.value) {
          toDate.min = fromDate.value;
          if (toDate.value && toDate.value < fromDate.value) {
            toDate.value = fromDate.value;
          }
        } else {
          toDate.removeAttribute('min');
        }
      });
    }

    // Requests table filtering
    const searchEl = document.getElementById('rvSearch');
    const typeEl = document.getElementById('rvTypeFilter');
    const statusEl = document.getElementById('rvStatusFilter');

    function applyRequestFilters() {
      const term = (searchEl && searchEl.value.trim().toLowerCase()) || '';
      const typeVal = (typeEl && typeEl.value.trim().toLowerCase()) || '';
      const statusVal = (statusEl && statusEl.value.trim().toLowerCase()) || '';

      document.querySelectorAll('#vehicleRequestsTable tbody tr').forEach(row => {
        const rowText = row.textContent.toLowerCase();
        const typeCell = row.querySelector('td:nth-child(2)')?.textContent.toLowerCase() || '';
        const statusCell = row.querySelector('td:nth-child(6)')?.textContent.toLowerCase() || '';

        const matchesSearch = !term || rowText.includes(term);
        const matchesType = !typeVal || typeCell.includes(typeVal);
        const matchesStatus = !statusVal || statusCell.includes(statusVal);

        row.style.display = (matchesSearch && matchesType && matchesStatus) ? '' : 'none';
      });
    }

    if (searchEl) searchEl.addEventListener('input', applyRequestFilters);
    if (typeEl) typeEl.addEventListener('change', applyRequestFilters);
    if (statusEl) statusEl.addEventListener('change', applyRequestFilters);

    // Clear filters for the table
    window.clearRequestFilters = function() {
      if (searchEl) searchEl.value = '';
      if (typeEl) typeEl.value = '';
      if (statusEl) statusEl.value = '';
      applyRequestFilters();
    };

    function invalidate(el, msg) {
      if (!el) return false;
      el.classList.add('is-invalid');
      const fb = el.parentElement?.querySelector('.invalid-feedback');
      if (fb) fb.textContent = msg || 'This field is required.';
      return false;
    }

    function clearInvalid(el) {
      if (!el) return;
      el.classList.remove('is-invalid');
    }

    function validate() {
      let ok = true;
      const req = (id) => document.getElementById(id);

      const requester = req('rvRequester');
      const vtype = req('rvVehicleType');
      const purpose = req('rvPurpose');
      const fDate = req('rvFromDate');
      const tDate = req('rvToDate');

      [requester, vtype, purpose, fDate, tDate].forEach(clearInvalid);

      if (!requester || !requester.value.trim()) ok = invalidate(requester, 'Requester is required.');
      if (!vtype || !vtype.value.trim()) ok = invalidate(vtype, 'Vehicle type is required.');
      if (!purpose || !purpose.value.trim()) ok = invalidate(purpose, 'Purpose is required.');
      if (!fDate || !fDate.value) ok = invalidate(fDate, 'From date is required.');
      if (!tDate || !tDate.value) ok = invalidate(tDate, 'To date is required.');

      if (ok && fDate && tDate && fDate.value > tDate.value) {
        ok = invalidate(tDate, 'To date cannot be earlier than From date.');
      }

      return ok;
    }

    form.addEventListener('submit', function(e) {
      e.preventDefault();
      if (!validate()) return;

      // In a real app, submit via fetch to backend route
      alert('Vehicle request submitted (demo). Connect to backend to persist.');
      form.reset();
    });

    // Optional: clear validation on input
    form.addEventListener('input', function(e) {
      const target = e.target;
      if (target && target.classList.contains('is-invalid')) {
        target.classList.remove('is-invalid');
      }
    });

    // Expose programmatic reset if needed
    window.resetVehicleRequestForm = function() {
      form.reset();
      [form.querySelectorAll('.is-invalid')].forEach(nodeList => nodeList.forEach(el => el.classList.remove('is-invalid')));
    };
  });
})();
