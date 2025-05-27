import React, { useLayoutEffect, useRef } from "react";
import * as am5 from "@amcharts/amcharts5";
import * as am5map from "@amcharts/amcharts5/map";
import am5themes_Animated from "@amcharts/amcharts5/themes/Animated";


import am5geodata_pakistanLow from "@amcharts/amcharts5-geodata/pakistanLow";

import Header from "./DashboardPages/Components/Header"; 
import Footer from "./DashboardPages/Components/Footer"; 


const cityDistrictMapping = [
  { name: "Lahore", districtId: "VERIFY_LAHORE_DISTRICT_ID_IN_GEOJSON", color: am5.color(0xFF6F00) },
  { name: "Multan", districtId: "VERIFY_MULTAN_DISTRICT_ID_IN_GEOJSON", color: am5.color(0xAD1457) },
  { name: "Faisalabad", districtId: "VERIFY_FAISALABAD_DISTRICT_ID_IN_GEOJSON", color: am5.color(0x0277BD) },
  { name: "Rawalpindi", districtId: "VERIFY_RAWALPINDI_DISTRICT_ID_IN_GEOJSON", color: am5.color(0x2E7D32) },
  { name: "Gujranwala", districtId: "VERIFY_GUJRANWALA_DISTRICT_ID_IN_GEOJSON", color: am5.color(0x512DA8) },
  { name: "Sargodha", districtId: "VERIFY_SARGODHA_DISTRICT_ID_IN_GEOJSON", color: am5.color(0xC62828) },
  { name: "Bahawalpur", districtId: "VERIFY_BAHAWALPUR_DISTRICT_ID_IN_GEOJSON", color: am5.color(0x4527A0) },
  { name: "Sialkot", districtId: "VERIFY_SIALKOT_DISTRICT_ID_IN_GEOJSON", color: am5.color(0x00695C) },

];


const DistMap = () => {
  const rootRef = useRef(null);

  useLayoutEffect(() => {
    if (rootRef.current) {
      rootRef.current.dispose();
    }

    let root = am5.Root.new("punjab-city-areas-map");
    rootRef.current = root;

    root.setThemes([am5themes_Animated.new(root)]);

    let chart = root.container.children.push(
      am5map.MapChart.new(root, {
        panX: "rotateX",
        panY: "translateY",
        projection: am5map.geoMercator(),
        homeGeoPoint: { longitude: 72.25, latitude: 31.17 }, // Approx. center of Punjab
        homeZoomLevel: 2.5, // Adjust to fit Punjab well
      })
    );

    let punjabProvinceSeries = chart.series.push(
      am5map.MapPolygonSeries.new(root, {
        geoJSON: am5geodata_pakistanLow, // Source of all polygons
        include: ["PK-PB"], 
        name: "punjabProvince"
      })
    );
    punjabProvinceSeries.mapPolygons.template.setAll({
      tooltipText: "{name}", // Shows "Punjab"
      interactive: false,
      fill: am5.color(0xF5F5F5), // Very light grey for province background
      stroke: am5.color(0xBDBDBD),
      strokeWidth: 0.8,
    });

    let highlightedCityDistrictsSeries = chart.series.push(
        am5map.MapPolygonSeries.new(root, {
            geoJSON: am5geodata_pakistanLow, 
            name: "highlightedCityDistricts"
        })
    );

    const dataToPush = [];
    cityDistrictMapping.forEach(cityInfo => {
        if (cityInfo.districtId && !cityInfo.districtId.startsWith("VERIFY_")) {
            dataToPush.push({
                id: cityInfo.districtId, // This ID must match a polygon ID in am5geodata_pakistanLow
                name: cityInfo.name,     // Tooltip name, e.g., "Lahore"
                fill: cityInfo.color     // Specific color for this city's district area
            });
        } else {
            console.warn(`Placeholder or missing districtId for city: ${cityInfo.name}. This city district will not be shown.`);
        }
    });

    if (dataToPush.length > 0) {
        highlightedCityDistrictsSeries.data.setAll(dataToPush);
    } else {
        console.warn("No valid city district data to display in highlightedCityDistrictsSeries. Check your cityDistrictMapping and GeoJSON IDs.");
    }


    highlightedCityDistrictsSeries.mapPolygons.template.setAll({
        tooltipText: "{name}", 
        interactive: true,
        stroke: am5.color(0xFFFFFF), 
        strokeWidth: 1.5, 
        cursorOverStyle: "pointer",
        fill: am5.color(0x000000)    });

    highlightedCityDistrictsSeries.mapPolygons.template.adapters.add("fill", function(fill, target) {
      if (target.dataItem && target.dataItem.dataContext && target.dataItem.dataContext.fill) {
        return target.dataItem.dataContext.fill; // Use color from cityDistrictMapping
      }
    
      return am5.color(0xCCCCCC); 
    });

  
    highlightedCityDistrictsSeries.mapPolygons.template.states.create("hover", {
        strokeWidth: 2.5,
        stroke: am5.color(0x333333) 
    });

    highlightedCityDistrictsSeries.mapPolygons.template.events.on("click", (ev) => {
        const dataContext = ev.target.dataItem.dataContext;
        if (dataContext) {
            const cityName = dataContext.name;
            const districtId = dataContext.id;
            alert(`${cityName} (District ID: ${districtId})`);
        }
    });

    
    highlightedCityDistrictsSeries.events.on("datavalidated", function() {
      console.log("Highlighted city districts series data validated. Number of polygons drawn:", highlightedCityDistrictsSeries.mapPolygons.length);
      if (highlightedCityDistrictsSeries.mapPolygons.length === 0 && dataToPush.length > 0) {
        console.error("Data was pushed to highlightedCityDistrictsSeries, but no polygons were drawn. This strongly indicates that the 'districtId' values in your 'cityDistrictMapping' do NOT match any 'id' properties in the 'am5geodata_pakistanLow.js' for the features within Punjab.");
      }
    });
    punjabProvinceSeries.events.on("datavalidated", function() {
        console.log("Punjab province series data validated.");
    });


    return () => {
      if (rootRef.current) {
        console.log("Disposing amCharts root.");
        rootRef.current.dispose();
        rootRef.current = null; 
      }
    };
  }, []); 

  return (
    <div>
      <Header />
      <div className="Browse bg-[#478e51] mb-8 p-4">

        <h2 className="text-white text-2xl text-center">Map of Punjab: Major Cities</h2>
        <p className="text-white text-center mt-2">Hover over or click on a city area.</p>
      </div>

      <div className="px-4">
        <div id="punjab-city-areas-map" style={{ width: "100%", height: "600px", border: "1px solid #ccc" }}></div>
      </div>

      <Footer />
    </div>
  );
};

export default DistMap;
