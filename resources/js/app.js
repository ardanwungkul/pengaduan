import "./bootstrap";
import { initFlowbite } from "flowbite";
import Alpine from "alpinejs";
import DataTable from "datatables.net-dt";
import "datatables.net-dt/css/dataTables.dataTables.min.css";
import jquery from "jquery";
window.$ = jquery;

window.Alpine = Alpine;

Alpine.start();
initFlowbite();
