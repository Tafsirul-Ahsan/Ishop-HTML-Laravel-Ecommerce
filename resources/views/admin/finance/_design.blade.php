
<style>
/* Shared Finance Admin design — scoped so admin.master and other modules stay untouched */
.finance-ui {
    --finance-ink: #253047;
    --finance-muted: #8992a3;
    --finance-border: #e9edf3;
    --finance-soft: #f5f7fb;
    --finance-primary: #4568dc;
    color: #566176;
}
.finance-ui h1, .finance-ui h2, .finance-ui h3, .finance-ui h4, .finance-ui h5 {
    color: var(--finance-ink);
    font-weight: 700;
    letter-spacing: -.25px;
}
.finance-ui h2 { font-size: 24px; }
.finance-ui .finance-page-heading {
    display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap;
    gap:12px; margin: 0 0 22px;
}
.finance-ui .finance-page-heading p {
    margin:6px 0 0; color:var(--finance-muted); font-size:13px;
}
.finance-ui .card-soft, .finance-ui .card {
    background:#fff; border:1px solid #edf0f5; border-radius:14px;
    box-shadow:0 5px 25px rgba(0,0,0,.045); overflow:hidden;
}
.finance-ui .card-soft.p-3, .finance-ui .card-soft.p-4 { padding:22px !important; }
.finance-ui form.card-soft { margin-bottom:18px; }
.finance-ui .form-label { color:#536078; font-size:13px; font-weight:600; margin-bottom:7px; }
.finance-ui .form-control, .finance-ui .form-select {
    min-height:42px; border:1px solid #dfe5ef; border-radius:9px;
    color:#344767; box-shadow:none; transition:border-color .2s, box-shadow .2s;
}
.finance-ui textarea.form-control { min-height:100px; }
.finance-ui .form-control:focus, .finance-ui .form-select:focus {
    border-color:#8da4ff; box-shadow:0 0 0 3px rgba(69,104,220,.12);
}
.finance-ui .btn { border-radius:9px; font-weight:600; padding:9px 14px; transition:all .2s ease; }
.finance-ui .btn-sm { padding:6px 10px; font-size:12px; }
.finance-ui .btn-primary { background:#4568dc; border-color:#4568dc; }
.finance-ui .btn-primary:hover { background:#3454c4; border-color:#3454c4; }
.finance-ui .btn-outline-primary { color:#4568dc; border-color:#cbd5ff; background:#f7f8ff; }
.finance-ui .btn-outline-primary:hover { color:#fff; background:#4568dc; border-color:#4568dc; }
.finance-ui .btn-light { color:#536078; background:#f5f7fb; border-color:#e9edf3; }
.finance-ui .table-responsive { width:100%; overflow-x:auto; }
.finance-ui table.table {
    width:100%; margin:0; border-collapse:separate; border-spacing:0;
    color:#566176; vertical-align:middle;
}
.finance-ui .table thead th {
    background:#f5f7fb; color:#536078; font-size:11px; font-weight:700;
    text-transform:uppercase; letter-spacing:.45px; white-space:nowrap;
    padding:15px 13px; border:0; border-bottom:1px solid #e7ebf2;
}
.finance-ui .table tbody td {
    padding:13px; font-size:13px; border:0; border-bottom:1px solid #f0f2f6;
    vertical-align:middle;
}
.finance-ui .table tbody tr { transition:background .18s ease; }
.finance-ui .table tbody tr:hover { background:#f8faff; }
.finance-ui .table tbody tr:last-child td { border-bottom:0; }
.finance-ui .badge { border-radius:20px; padding:7px 10px; font-size:11px; font-weight:700; }
.finance-ui .alert { border:0; border-radius:10px; }
.finance-ui .pagination { margin:18px 0 0; gap:4px; }
.finance-ui .page-link { border-radius:7px !important; border-color:#e7ebf2; color:#4568dc; }
.finance-ui .page-item.active .page-link { background:#4568dc; border-color:#4568dc; }
.finance-ui .metric-label { color:#8992a3; font-size:12px; font-weight:700; text-transform:uppercase; letter-spacing:.35px; }
.finance-ui .metric-value { margin-top:8px; font-size:22px; font-weight:800; color:#253047; overflow-wrap:anywhere; }
.finance-ui hr { border-color:#e9edf3; opacity:1; }
@media (max-width:767px) {
    .finance-ui h2 { font-size:20px; }
    .finance-ui .card-soft.p-3, .finance-ui .card-soft.p-4 { padding:16px !important; }
    .finance-ui .finance-page-heading { align-items:flex-start; }
    .finance-ui .metric-value { font-size:19px; }
}
@media print {
    .finance-ui .btn, .finance-ui form, .finance-ui .finance-no-print { display:none !important; }
    .finance-ui .card-soft, .finance-ui .card { box-shadow:none; border:1px solid #ddd; }
}
</style>
