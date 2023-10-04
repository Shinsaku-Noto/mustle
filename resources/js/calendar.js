import { Calendar } from "@fullcalendar/core";
import interactionPlugin from "@fullcalendar/interaction";
import dayGridPlugin from "@fullcalendar/daygrid";
import axios from 'axios';
// import timeGridPlugin from "@fullcalendar/timegrid";

var calendarEl = document.getElementById("calendar");

let initialEvents = [];
let calendar = new Calendar(calendarEl, {
    plugins: [interactionPlugin, dayGridPlugin,],
    initialView: "dayGridMonth",
    headerToolbar: {
        left: "prev,next",
        center: "title",
        right: "",
        end: "dayGridMonth,timeGridWeek",
    },
    locale: "ja",

    // 日付クリックイベント
    events: initialEvents,
    
    dateClick: function (info) {
            window.location.href ="/?date=" + info.dateStr;
        },
        
    eventSources: [ // ←★追記
        {
            url: '/get_events',
        },
    ],
});
calendar.render();