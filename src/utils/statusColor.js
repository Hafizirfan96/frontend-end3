// export const statusColor = (x) =>
//     x === "PENDING" ?
//         "bg-yellow-100 text-yellow-700 border border-yellow-700" :
//         x === "ASSIGNED" ?
//             "bg-blue-100 text-blue-700 border border-blue-700" :
//             x === "SCHEDULED" ?
//                 "bg-purple-100 text-purple-700 border border-purple-700" :
//                 x === "ARRIVED" ?
//                     "bg-green-100 text-green-700 border border-green-700" :
//                     x === "DELIVERED" ?
//                         "bg-teal-200 text-teal-800 border border-teal-800" :
//                         x === "CANCELLED" ?
//                             "bg-red-100 text-red-700 border border-red-700" :
//                             x === "ON_THE_WAY" ? "bg-lime-100 text-lime-700 border border-lime-700" :
//                                 x === "REJECTED" ? "bg-red-100 text-red-700 border border-red-700" : "";

// export const statusColorBorder = (x) =>
//     x === "PENDING" ?
//         "border-yellow-200 " :
//         x === "ASSIGNED" ?
//             "border-blue-200 " :
//             x === "SCHEDULED" ?
//                 "border-purple-200 " :
//                 x === "ARRIVED" ?
//                     "border-green-200 " :
//                     x === "DELIVERED" ?
//                         "border-teal-200 " :
//                         x === "CANCELLED" ?
//                             "border-red-200 " :
//                             x === "ON_THE_WAY" ? "border-lime-700" :
//                                 x === "REJECTED" ? "border-red-700" :
//                                     "";

const statusStyles = {
    PENDING: { bg: "bg-yellow-100", text: "text-yellow-700", border: "border border-yellow-700", borderOnly: "border-yellow-200" },
    ASSIGNED: { bg: "bg-blue-100", text: "text-blue-700", border: "border border-blue-700", borderOnly: "border-blue-200" },
    SCHEDULED: { bg: "bg-purple-100", text: "text-purple-700", border: "border border-purple-700", borderOnly: "border-purple-200" },
    ARRIVED: { bg: "bg-green-100", text: "text-green-700", border: "border border-green-700", borderOnly: "border-green-200" },
    DELIVERED: { bg: "bg-teal-200", text: "text-teal-800", border: "border border-teal-800", borderOnly: "border-teal-200" },
    CANCELLED: { bg: "bg-red-100", text: "text-red-700", border: "border border-red-700", borderOnly: "border-red-200" },
    ON_THE_WAY: { bg: "bg-lime-100", text: "text-lime-700", border: "border border-lime-700", borderOnly: "border-lime-700" },
    REJECTED: { bg: "bg-red-100", text: "text-red-700", border: "border border-red-700", borderOnly: "border-red-700" },
    COMPLETED: { bg: "bg-green-100", text: "text-green-700", border: "border border-green-700", borderOnly: "border-green-700" },
    FAILED: { bg: "bg-red-100", text: "text-red-700", border: "border border-red-700", borderOnly: "border-red-700" },
};

export const statusColor = (status) => {
    const style = statusStyles[status?.toUpperCase()] || {};
    return `${style.bg || ""} ${style.text || ""} ${style.border || ""}`.trim();
};

export const statusColorBorder = (status) => statusStyles[status]?.borderOnly || "";


const deliveryTypeStyles = {
    URGENT:{ bg: "bg-red-100", text: "text-red-700", border: "border border-red-700", borderOnly: "border-red-200" },
    NORMAL: { bg: "bg-blue-100", text: "text-blue-700", border: "border border-blue-700", borderOnly: "border-blue-200" },
};

export const deliveryTypeColor = (type) => {
    const style = deliveryTypeStyles[type] || {};
    return `${style.bg || ""} ${style.text || ""} ${style.border || ""}`.trim();
};

export const deliveryTypeColorBorder = (type) => deliveryTypeStyles[type]?.borderOnly || "";