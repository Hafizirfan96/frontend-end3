// // src/components/DistMap.js or .tsx if using TypeScript
// import React, { useEffect, useRef } from "react";

// // Props: districts and district mapping

// const districts = {
//   rajanpur: 1,
//   deraghazikhan: 2,
//   multan: 3,
//   lahore: 4,
//   faisalabad: 5,
//   gujranwala: 6,
//   sialkot: 7,
//   rawalpindi: 8,
//   islamabad: 9,
//   sargodha: 10,
//   chakwal: 11,
//   jhelum: 12,
//   bahawalpur: 13,
//   bahawalnagar: 14,
//   vehari: 15,
//   khanewal: 16,
//   muzaffargarh: 17,
//   layyah: 18,
//   kasur: 19,
//   okara: 20,
//   sheikhupura: 21,
//   narowal: 22,
//   hafizabad: 23,
//   mianwali: 24,
//   bhakkar: 25,
//   attock: 26,
//   gujrat: 27,
//   toba_tek_singh: 28,
//   jhang: 29,
//   chiniot: 30,
//   lodhran: 31,
//   pakpattan: 32,
//   khushab: 33,
//   nawabshah: 34,
//   hyderabad: 35,
//   karachi: 36,
//   sukkur: 37,
//   larkana: 38,
//   gilgit: 39,
//   skardu: 40,
//   quetta: 41,
//   zhob: 42,
//   peshawar: 43,
//   mardan: 44,
//   swat: 45,
//   dera_ismail_khan: 46,
//   bannu: 47
// };
// const districtsData = [
//   { id: 1, name: "Rajanpur" },
//   { id: 2, name: "Dera Ghazi Khan" },
//   { id: 3, name: "Multan" },
//   { id: 4, name: "Lahore" },
//   { id: 5, name: "Faisalabad" },
//   { id: 6, name: "Gujranwala" },
//   { id: 7, name: "Sialkot" },
//   { id: 8, name: "Rawalpindi" },
//   { id: 9, name: "Islamabad" },
//   { id: 10, name: "Sargodha" },
//   { id: 11, name: "Chakwal" },
//   { id: 12, name: "Jhelum" },
//   { id: 13, name: "Bahawalpur" },
//   { id: 14, name: "Bahawalnagar" },
//   { id: 15, name: "Vehari" },
//   { id: 16, name: "Khanewal" },
//   { id: 17, name: "Muzaffargarh" },
//   { id: 18, name: "Layyah" },
//   { id: 19, name: "Kasur" },
//   { id: 20, name: "Okara" },
//   { id: 21, name: "Sheikhupura" },
//   { id: 22, name: "Narowal" },
//   { id: 23, name: "Hafizabad" },
//   { id: 24, name: "Mianwali" },
//   { id: 25, name: "Bhakkar" },
//   { id: 26, name: "Attock" },
//   { id: 27, name: "Gujrat" },
//   { id: 28, name: "Toba Tek Singh" },
//   { id: 29, name: "Jhang" },
//   { id: 30, name: "Chiniot" },
//   { id: 31, name: "Lodhran" },
//   { id: 32, name: "Pakpattan" },
//   { id: 33, name: "Khushab" }
// ];
// const DistMap = () => {
//   const mapRef = useRef(null);

//   useEffect(() => {
//     if (!window.AmCharts || !window.AmCharts.makeChart) return;

//     const map = new window.AmCharts.AmMap();
//     map.path = "https://cdn.amcharts.com/lib/3/";

//     const dataProvider = {
//       mapVar: window.AmCharts.maps.pakistanCustom,
//       areas: districtsData,
//     };

//     map.dataProvider = dataProvider;

//     map.areasSettings = {
//       unlistedAreasColor: "#DDDDDD",
//       rollOverOutlineColor: "#FFFFFF",
//       rollOverColor: "#CC0000",
//     };

//     map.zoomControl = {
//       buttonFillColor: "#2f4798",
//       buttonRollOverColor: "#2f3998",
//       buttonFillHoverColor: "#0a2910",
//       buttonBorderColor: "#000000",
//       gridBackgroundColor: "#e8f5e9",
//       gridColor: "#155724",
//       gridAlpha: 0.5,
//     };

//     map.write(mapRef.current);

//     map.addListener("clickMapObject", function (event) {
//       if (event.mapObject?.id) {
//         const districtId = event.mapObject.id.toLowerCase();
//         const districtValue = districts[districtId];

//         if (districtValue) {
//           const link = document.createElement("a");
//           link.href = `/districtdetails/${districtValue}`; // Adjust route as needed
//           link.target = "_blank";
//           link.innerHTML = `Click for ${districtId} Details`;

//           const mapLink = document.getElementById("maplink");
//           if (mapLink) {
//             mapLink.innerHTML = "";
//             mapLink.appendChild(link);
//           }

//           // Your custom chart update function
//           if (typeof window.updateChart === "function") {
//             window.updateChart(districtValue);
//           }
//         }
//       }
//     });

//     return () => {
//       if (map && map.clear) {
//         map.clear();
//       }
//     };
//   }, [districtsData, districts]);

//   return (
//     <div>
//       <div id="mapdiv" ref={mapRef} style={{ width: "100%", height: "600px" }}></div>
//       <div id="maplink" style={{ marginTop: 10 }}></div>
//     </div>
//   );
// };

// export default DistMap;

import React, { useEffect, useRef } from "react";

const districtsData = [
  { id: "pk-pb-rajanpur", title: "Rajanpur" },
  { id: "pk-pb-deraghazikhan", title: "Dera Ghazi Khan" },
  { id: "pk-pb-multan", title: "Multan" },
  { id: "pk-pb-lahore", title: "Lahore" },
  { id: "pk-pb-faisalabad", title: "Faisalabad" },
  { id: "pk-pb-rawalpindi", title: "Rawalpindi" },
  { id: "pk-pb-gujranwala", title: "Gujranwala" },
  { id: "pk-pb-sialkot", title: "Sialkot" },
];

const districts = {
    "attock": 1,
    "bahawalnagar": 2,
    "bahawalpur": 3,
    "bhakkar": 4,
    "chakwal": 5,
    "chiniot": 6,
    "deraghazikhan": 71,
    "faisalabad": 8,
    "gujranwala": 9,
    "gujrat": 10,
    "hafizabad": 11,
    "jhang": 12,
    "jhelum": 13,
    "kasur": 14,
    "khanewal": 15,
    "khushab": 16,
    "lahore": 17,
    "layyah": 18,
    "lodhran": 19,
    "mandibahauddin": 20,
    "mianwali": 21,
    "multan": 22,
    "muzaffargarh": 23,
    "nankanasahib": 24,
    "narowal": 25,
    "okara": 26,
    "pakpattan": 27,
    "rahimyarkhan": 200,
    "rajanpur": 29,
    "rawalpindi": 30,
    "sahiwal": 31,
    "sargodha": 32,
    "sheikhupura": 33,
    "sialkot": 34,
    "tobateksingh": 35,
    "vehari": 36
}

const DistMap = ({ onDistrictClick }) => {
  const mapInstance = useRef(null);

  useEffect(() => {
    if (!window.AmCharts || !window.AmCharts.AmMap) {
      console.error("AmCharts library not loaded");
      return;
    }

    const AmCharts = window.AmCharts;

    console.log("AmCharts.maps.pakistanCustom", AmCharts.maps.pakistanCustom);
    if (!AmCharts.maps.pakistanCustom) {
      console.error("pakistanCustom map is not loaded");
      return;
    }

    const map = new AmCharts.AmMap();
    map.path = "https://cdn.amcharts.com/lib/3/";

    map.dataProvider = {
      mapVar: AmCharts.maps.pakistanCustom,
      areas: districtsData,
    };

    map.areasSettings = {
      unlistedAreasColor: "#DDDDDD",
      rollOverOutlineColor: "#FFFFFF",
      rollOverColor: "#CC0000",
      autoZoom: true,
      balloonText: "[[title]]", // Tooltip on hover
    };

    map.zoomControl = {
      buttonFillColor: "#2f4798",
      buttonRollOverColor: "#2f3998",
      buttonFillHoverColor: "#0a2910",
      buttonBorderColor: "#000000",
      gridBackgroundColor: "#e8f5e9",
      gridColor: "#155724",
      gridAlpha: 0.5,
    };

    map.write("mapdiv");
    mapInstance.current = map;

    map.addListener("clickMapObject", (event) => {
      if (event.mapObject && event.mapObject.id) {
       const districtKey = event.mapObject.id.toLowerCase();
       const districtId = districts[districtKey];

        if (districtId) {
          if (onDistrictClick) onDistrictClick(districtId);

          const maplink = document.getElementById("maplink");
          if (maplink) {
            maplink.innerHTML = "";
            const link = document.createElement("a");
            link.href = `/districtdetails/${districtId}`;
            link.target = "_blank";
            link.textContent = `Click for ${event.mapObject.title} Details`;
            maplink.appendChild(link);
          }

          if (typeof window.updateChart === "function") {
            window.updateChart(districtId);
          }
        }
      }
    });

    return () => {
      if (mapInstance.current && typeof mapInstance.current.clear === "function") {
        mapInstance.current.clear();
      }
    };
  }, [onDistrictClick]);

  return (
    <>
      <div id="mapdiv" style={{ width: "100%", height: "600px", border: "1px solid #ccc" }} />
      <div id="maplink" style={{ marginTop: 10 }} />
    </>
  );
};

export default DistMap;

