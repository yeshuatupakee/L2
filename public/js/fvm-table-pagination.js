// Reusable table pagination (10 rows/page) with Bootstrap-like footer
(function() {
  function paginateTable(table, rowsPerPage = 10) {
    if (!table || !table.tBodies || !table.tBodies[0]) return;
    const tbody = table.tBodies[0];
    const rows = Array.from(tbody.querySelectorAll('tr'));
    const card = table.closest('.card');
    if (!card) return;

    // Ensure footer exists
    let footer = card.querySelector('.card-footer');
    if (!footer) {
      footer = document.createElement('div');
      footer.className = 'card-footer';
      card.appendChild(footer);
    }

    // Build footer content container
    footer.innerHTML = '';
    const wrap = document.createElement('div');
    wrap.className = 'd-flex justify-content-between align-items-center';

    const info = document.createElement('small');
    info.className = 'text-muted';

    const nav = document.createElement('nav');
    const ul = document.createElement('ul');
    ul.className = 'pagination pagination-sm mb-0';

    const prevLi = document.createElement('li');
    prevLi.className = 'page-item';
    const prevA = document.createElement('a');
    prevA.className = 'page-link';
    prevA.href = '#';
    prevA.textContent = 'Previous';
    prevLi.appendChild(prevA);

    const pageLi = document.createElement('li');
    pageLi.className = 'page-item active';
    const pageA = document.createElement('a');
    pageA.className = 'page-link';
    pageA.href = '#';
    pageA.textContent = '1';
    pageLi.appendChild(pageA);

    const nextLi = document.createElement('li');
    nextLi.className = 'page-item';
    const nextA = document.createElement('a');
    nextA.className = 'page-link';
    nextA.href = '#';
    nextA.textContent = 'Next';
    nextLi.appendChild(nextA);

    ul.appendChild(prevLi);
    ul.appendChild(pageLi);
    ul.appendChild(nextLi);
    nav.appendChild(ul);

    wrap.appendChild(info);
    wrap.appendChild(nav);
    footer.appendChild(wrap);

    let currentPage = 1;

    function render() {
      // Only consider currently visible rows (not display:none) for pagination
      const visibleRows = rows.filter(r => r.style.display !== 'none');
      const totalRows = visibleRows.length;
      const totalPages = Math.max(1, Math.ceil(totalRows / rowsPerPage));
      if (currentPage > totalPages) currentPage = totalPages;
      if (currentPage < 1) currentPage = 1;

      const start = (currentPage - 1) * rowsPerPage;
      const end = start + rowsPerPage;
      // First hide all visible rows, then show current page among them
      visibleRows.forEach(r => { r.dataset._pghidden = '1'; r.style.display = 'none'; });
      visibleRows.slice(start, end).forEach(r => { r.style.display = ''; r.dataset._pghidden = ''; });

      const showing = Math.min(rowsPerPage, Math.max(0, totalRows - start));
      info.textContent = `Showing ${showing} of ${totalRows} items`;

      // Prev/Next state
      if (currentPage === 1) prevLi.classList.add('disabled'); else prevLi.classList.remove('disabled');
      if (currentPage >= totalPages) nextLi.classList.add('disabled'); else nextLi.classList.remove('disabled');

      pageA.textContent = String(currentPage);
      pageLi.classList.add('active');
    }

    prevA.addEventListener('click', function(e) {
      e.preventDefault();
      if (prevLi.classList.contains('disabled')) return;
      currentPage -= 1;
      render();
    });

    nextA.addEventListener('click', function(e) {
      e.preventDefault();
      if (nextLi.classList.contains('disabled')) return;
      currentPage += 1;
      render();
    });

    // Public API to re-render after filtering
    table._repaginate = function() { render(); };

    // Initial render
    render();

    // Observe for row changes (optional)
    const mo = new MutationObserver(() => {
      // In case rows added/removed
      render();
    });
    mo.observe(tbody, { childList: true, subtree: false });
  }

  document.addEventListener('DOMContentLoaded', function() {
    const candidates = [
      ...document.querySelectorAll('table.paginate-10'),
      ...document.querySelectorAll('#vehiclesTable, #maintenanceTable, #vehicleRequestsTable')
    ];
    const seen = new Set();
    candidates.forEach(t => {
      if (seen.has(t)) return;
      seen.add(t);
      paginateTable(t, 10);
    });

    // Hook into common filter events to re-render page counts when filters change
    const reapply = () => {
      seen.forEach(t => t._repaginate && t._repaginate());
    };
    ['input', 'change'].forEach(evt => {
      document.addEventListener(evt, (e) => {
        const target = e.target;
        if (target && (target.matches('#searchInput, #statusFilter, #typeFilter, #searchMaintenance, #rvSearch, #rvTypeFilter, #rvStatusFilter') || target.closest('.form-select') || target.closest('input'))) {
          reapply();
        }
      });
    });
  });
})();
