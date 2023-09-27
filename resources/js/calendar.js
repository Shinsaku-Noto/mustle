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
        left: "prev,next today",
        center: "title",
        right: "",
        end: "dayGridMonth,timeGridWeek",
    },
    locale: "ja",

    // // 日付クリックイベント
    
    // dayClick: function(date) {
    //       console.log(date);
    // }
    events: initialEvents,
    
    dateClick: function (info) {
            window.location.href = "/?date=" + info.dateStr;
        },
    
    // selectable: true,
    // select: function (info) {
    //     // alert("selected " + info.startStr + " to " + info.endStr);
        
    //     axios.post("/", {
    //         select_date: info.start.valueOf(),
    //     });
        
    // },
});
calendar.render();