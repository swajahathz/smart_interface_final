
var t = document.getElementById("crm-total-customers");
if (t !== null) {
    t.innerHTML = "";
    var l = {
            chart: { type: "line", height: 40, width: 100, sparkline: { enabled: !0 } },
            stroke: { show: !0, curve: "smooth", lineCap: "butt", colors: void 0, width: 1.5, dashArray: 0 },
            fill: { type: "gradient", gradient: { opacityFrom: 0.9, opacityTo: 0.9, stops: [0, 98] } },
            series: [{ name: "Value", data: [20, 14, 19, 10, 23, 20, 22, 9, 12] }],
            yaxis: { min: 0, show: !1, axisBorder: { show: !1 } },
            xaxis: { show: !1, axisBorder: { show: !1 } },
            tooltip: { enabled: !1 },
            colors: ["rgb(132, 90, 223)"],
        },
        l = new ApexCharts(document.querySelector("#crm-total-customers"), l);
    l.render();
}
function p(r) {
    l.updateOptions({ colors: ["rgb(" + r + ")"] });
}
var t = document.getElementById("crm-total-revenue");
if (t !== null) {
    t.innerHTML = "";
    var d = {
            chart: { type: "line", height: 40, width: 100, sparkline: { enabled: !0 } },
            stroke: { show: !0, curve: "smooth", lineCap: "butt", colors: void 0, width: 1.5, dashArray: 0 },
            fill: { type: "gradient", gradient: { opacityFrom: 0.9, opacityTo: 0.9, stops: [0, 98] } },
            series: [{ name: "Value", data: [20, 14, 20, 22, 9, 12, 19, 10, 25] }],
            yaxis: { min: 0, show: !1, axisBorder: { show: !1 } },
            xaxis: { show: !1, axisBorder: { show: !1 } },
            tooltip: { enabled: !1 },
            colors: ["rgb(35, 183, 229)"],
        },
        d = new ApexCharts(document.querySelector("#crm-total-revenue"), d);
    d.render();
}
var t = document.getElementById("crm-conversion-ratio");
if (t !== null) {
    t.innerHTML = "";
    var u = {
            chart: { type: "line", height: 40, width: 100, sparkline: { enabled: !0 } },
            stroke: { show: !0, curve: "smooth", lineCap: "butt", colors: void 0, width: 1.5, dashArray: 0 },
            fill: { type: "gradient", gradient: { opacityFrom: 0.9, opacityTo: 0.9, stops: [0, 98] } },
            series: [{ name: "Value", data: [20, 20, 22, 9, 14, 19, 10, 25, 12] }],
            yaxis: { min: 0, show: !1, axisBorder: { show: !1 } },
            xaxis: { show: !1, axisBorder: { show: !1 } },
            tooltip: { enabled: !1 },
            colors: ["rgb(38, 191, 148)"],
        },
        u = new ApexCharts(document.querySelector("#crm-conversion-ratio"), u);
    u.render();
}
var t = document.getElementById("crm-total-deals");
if (t !== null) {
    t.innerHTML = "";
    var c = {
            chart: { type: "line", height: 40, width: 100, sparkline: { enabled: !0 } },
            stroke: { show: !0, curve: "smooth", lineCap: "butt", colors: void 0, width: 1.5, dashArray: 0 },
            fill: { type: "gradient", gradient: { opacityFrom: 0.9, opacityTo: 0.9, stops: [0, 98] } },
            series: [{ name: "Value", data: [20, 20, 22, 9, 12, 14, 19, 10, 25] }],
            yaxis: { min: 0, show: !1, axisBorder: { show: !1 } },
            xaxis: { show: !1, axisBorder: { show: !1 } },
            tooltip: { enabled: !1 },
            colors: ["rgb(245, 184, 73)"],
        },
        c = new ApexCharts(document.querySelector("#crm-total-deals"), c);
    c.render();
}
var t = document.getElementById("crm-revenue-analytics");
if (t !== null) {
    t.innerHTML = "";
    var f = {
            series: [
                {
                    type: "line",
                    name: "Profit",
                    data: [
                        { x: "Jan", y: 100 },
                        { x: "Feb", y: 210 },
                        { x: "Mar", y: 180 },
                        { x: "Apr", y: 454 },
                        { x: "May", y: 230 },
                        { x: "Jun", y: 320 },
                        { x: "Jul", y: 656 },
                        { x: "Aug", y: 830 },
                        { x: "Sep", y: 350 },
                        { x: "Oct", y: 350 },
                        { x: "Nov", y: 210 },
                        { x: "Dec", y: 410 },
                    ],
                },
                {
                    type: "line",
                    name: "Revenue",
                    chart: { dropShadow: { enabled: !0, enabledOnSeries: void 0, top: 5, left: 0, blur: 3, color: "#000", opacity: 0.1 } },
                    data: [
                        { x: "Jan", y: 180 },
                        { x: "Feb", y: 620 },
                        { x: "Mar", y: 476 },
                        { x: "Apr", y: 220 },
                        { x: "May", y: 520 },
                        { x: "Jun", y: 780 },
                        { x: "Jul", y: 435 },
                        { x: "Aug", y: 515 },
                        { x: "Sep", y: 738 },
                        { x: "Oct", y: 454 },
                        { x: "Nov", y: 525 },
                        { x: "Dec", y: 230 },
                    ],
                },
                {
                    type: "area",
                    name: "Sales",
                    chart: { dropShadow: { enabled: !0, enabledOnSeries: void 0, top: 5, left: 0, blur: 3, color: "#000", opacity: 0.1 } },
                    data: [
                        { x: "Jan", y: 200 },
                        { x: "Feb", y: 530 },
                        { x: "Mar", y: 110 },
                        { x: "Apr", y: 130 },
                        { x: "May", y: 480 },
                        { x: "Jun", y: 520 },
                        { x: "Jul", y: 780 },
                        { x: "Aug", y: 435 },
                        { x: "Sep", y: 475 },
                        { x: "Oct", y: 738 },
                        { x: "Nov", y: 454 },
                        { x: "Dec", y: 480 },
                    ],
                },
            ],
            chart: { height: 350, animations: { speed: 500 }, dropShadow: { enabled: !0, enabledOnSeries: void 0, top: 8, left: 0, blur: 3, color: "#000", opacity: 0.1 } },
            colors: ["rgb(132, 90, 223)", "rgba(35, 183, 229, 0.85)", "rgba(119, 119, 142, 0.05)"],
            dataLabels: { enabled: !1 },
            grid: { borderColor: "#f1f1f1", strokeDashArray: 3 },
            stroke: { curve: "smooth", width: [2, 2, 0], dashArray: [0, 5, 0] },
            xaxis: { axisTicks: { show: !1 } },
            yaxis: {
                labels: {
                    formatter: function (e) {
                        return "$" + e;
                    },
                },
            },
            tooltip: {
                y: [
                    {
                        formatter: function (e) {
                            return e !== void 0 ? "$" + e.toFixed(0) : e;
                        },
                    },
                    {
                        formatter: function (e) {
                            return e !== void 0 ? "$" + e.toFixed(0) : e;
                        },
                    },
                    {
                        formatter: function (e) {
                            return e !== void 0 ? e.toFixed(0) : e;
                        },
                    },
                ],
            },
            legend: { show: !0, customLegendItems: ["Profit", "Revenue", "Sales"], inverseOrder: !0 },
            title: { text: "Revenue Analytics with sales & profit (USD)", align: "left", style: { fontSize: ".8125rem", fontWeight: "semibold", color: "#8c9097" } },
            markers: { hover: { sizeOffset: 5 } },
        },
        i = new ApexCharts(document.querySelector("#crm-revenue-analytics"), f);
    i.render();
}
function x(r) {
    i.updateOptions({ colors: ["rgba(" + r + ", 1)", "rgba(35, 183, 229, 0.85)", "rgba(119, 119, 142, 0.05)"] });
}
var t = document.getElementById("crm-profits-earned");
if (t !== null) {
    t.innerHTML = "";
    var m = {
            series: [
                { name: "Profit Earned", data: [44, 42, 57, 86, 58, 55, 70] },
                { name: "Total Sales", data: [34, 22, 37, 56, 21, 35, 60] },
            ],
            chart: { type: "bar", height: 180, toolbar: { show: !1 } },
            grid: { borderColor: "#f1f1f1", strokeDashArray: 3 },
            colors: ["rgb(132, 90, 223)", "#e4e7ed"],
            plotOptions: {
                bar: {
                    colors: {
                        ranges: [
                            { from: -100, to: -46, color: "#ebeff5" },
                            { from: -45, to: 0, color: "#ebeff5" },
                        ],
                    },
                    columnWidth: "60%",
                    borderRadius: 5,
                },
            },
            dataLabels: { enabled: !1 },
            stroke: { show: !0, width: 2, colors: void 0 },
            legend: { show: !1, position: "top" },
            yaxis: {
                title: { style: { color: "#adb5be", fontSize: "13px", fontFamily: "poppins, sans-serif", fontWeight: 600, cssClass: "apexcharts-yaxis-label" } },
                labels: {
                    formatter: function (r) {
                        return r.toFixed(0) + "";
                    },
                },
            },
            xaxis: {
                type: "week",
                categories: ["S", "M", "T", "W", "T", "F", "S"],
                axisBorder: { show: !0, color: "rgba(119, 119, 142, 0.05)", offsetX: 0, offsetY: 0 },
                axisTicks: { show: !0, borderType: "solid", color: "rgba(119, 119, 142, 0.05)", width: 6, offsetX: 0, offsetY: 0 },
                labels: { rotate: -90 },
            },
        },
        y = new ApexCharts(document.querySelector("#crm-profits-earned"), m);
    y.render();
}
function b(r) {
    y.updateOptions({ colors: ["rgba(" + r + ", 1)", "#ededed"] });
}
let n;
function g(r) {
    typeof n < "u" && n !== null && n.destroy(),
        (Chart.defaults.elements.arc.borderWidth = 0),
        (Chart.defaults.datasets.doughnut.cutout = "85%"),
        (n = new Chart(document.getElementById("leads-source"), {
            type: "doughnut",
            data: { datasets: [{ label: "My First Dataset", data: [32, 27, 25, 16], backgroundColor: [`rgb(${r})`, "rgb(35, 183, 229)", "rgb(245, 184, 73)", "rgb(38, 191, 148)"] }] },
            plugins: [
                {
                    afterUpdate: function (a) {
                        a.getDatasetMeta(0).data.forEach(function (s) {
                            s.round = {
                                x: (a.chartArea.left + a.chartArea.right) / 2,
                                y: (a.chartArea.top + a.chartArea.bottom) / 2,
                                radius: (s.outerRadius + s.innerRadius) / 2,
                                thickness: (s.outerRadius - s.innerRadius) / 2,
                                backgroundColor: s.options.backgroundColor,
                            };
                        });
                    },
                    afterDraw: (a) => {
                        const { ctx: e, canvas: s } = a;
                        a.getDatasetMeta(0).data.forEach((o) => {
                            Math.PI / 2 - o.startAngle;
                            const h = Math.PI / 2 - o.endAngle;
                            e.save(),
                                e.translate(o.round.x, o.round.y),
                                (e.fillStyle = o.options.backgroundColor),
                                e.beginPath(),
                                e.arc(o.round.radius * Math.sin(h), o.round.radius * Math.cos(h), o.round.thickness, 0, 2 * Math.PI),
                                e.closePath(),
                                e.fill(),
                                e.restore();
                        });
                    },
                },
            ],
        }));
}
export { b as a, p as c, g as l, x as r };
