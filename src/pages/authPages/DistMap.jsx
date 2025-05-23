import React, { useLayoutEffect, useRef } from "react";
import * as am5 from "@amcharts/amcharts5";
import * as am5map from "@amcharts/amcharts5/map";
import am5themes_Animated from "@amcharts/amcharts5/themes/Animated";
import am5geodata_pakistanLow from "@amcharts/amcharts5-geodata/pakistanLow"; // Ensure this path is correct

// Assuming these paths are correct for your project structure
import Header from "./DashboardPages/Components/Header";
import Footer from "./DashboardPages/Components/Footer";

// --- Data for Major City Districts to Highlight ---
// Each object maps a city name to its corresponding DISTRICT ISO CODE from am5geodata_pakistanLow.js
// CRITICAL: Ensure 'districtId' is the correct ID from your GeoJSON for the city's main administrative area.
const cityDistrictMapping = [
  { name: "Lahore", districtId: "PK-PB-133", color: am5.color(0xFF6F00) }, // Bright Orange
  { name: "Multan", districtId: "PK-PB-138", color: am5.color(0xAD1457) }, // Deep Pink/Magenta
  { name: "Faisalabad", districtId: "PK-PB-128", color: am5.color(0x0277BD) }, // Strong Blue
  { name: "Rawalpindi", districtId: "PK-PB-101", color: am5.color(0x2E7D32) }, // Dark Green (Ensure PK-PB-101 is Rawalpindi Dist.)
  { name: "Gujranwala", districtId: "PK-PB-117", color: am5.color(0x512DA8) }, // Deep Purple (Ensure PK-PB-117 is Gujranwala Dist.)
  { name: "Sargodha", districtId: "PK-PB-126", color: am5.color(0xC62828) }, // Example ID, replace with actual. Dark Red
  { name: "Bahawalpur", districtId: "PK-PB-141", color: am5.color(0x4527A0) }, // Example ID, replace with actual. Indigo
  { name: "Sialkot", districtId: "PK-PB-137", color: am5.color(0x00695C) }, // Teal
  // Add more cities here. The 'districtId' MUST exist in am5geodata_pakistanLow.
];


const DistMap = () => {
  const rootRef = useRef(null);

  useLayoutEffect(() => {
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

    // --- 1. Base Series for Punjab Province (as a background) ---
    let punjabProvinceSeries = chart.series.push(
      am5map.MapPolygonSeries.new(root, {
        geoJSON: am5geodata_pakistanLow,
        include: ["PK-PB"], // Only Punjab province polygon
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

    // --- 2. Series for ALL Punjab Districts (dimmed background layer) ---
    // THIS SERIES IS NOW REMOVED/COMMENTED OUT TO EMPHASIZE CITY DISTRICTS
    /*
    const allPunjabDistrictCodes = [ // You would need this list if you re-enable this series
        "PK-PB-101", "PK-PB-102", ..., "PK-PB-141"
    ];
    if (allPunjabDistrictCodes.length > 0) {
      let allDistrictsSeries = chart.series.push(
        am5map.MapPolygonSeries.new(root, {
          geoJSON: am5geodata_pakistanLow,
          include: allPunjabDistrictCodes,
          name: "allPunjabDistricts"
        })
      );
      allDistrictsSeries.mapPolygons.template.setAll({
        tooltipText: "{name}",
        interactive: true,
        fill: am5.color(0xECEFF1), // Extremely light, almost invisible
        stroke: am5.color(0xCFD8DC), // Very light stroke
        strokeWidth: 0.3,
        cursorOverStyle: "pointer",
      });
      allDistrictsSeries.mapPolygons.template.states.create("hover", {
        fill: am5.color(0xE0E0E0),
      });
      allDistrictsSeries.mapPolygons.template.events.on("click", (ev) => {
        const districtName = ev.target.dataItem.dataContext.name;
        alert(`District: ${districtName}`);
      });
    }
    */

    // --- 3. Series for Highlighting Specific City Districts ---
    // These will be the primary colored areas within Punjab.
    let highlightedCityDistrictsSeries = chart.series.push(
        am5map.MapPolygonSeries.new(root, {
            geoJSON: am5geodata_pakistanLow, // Source of all polygons
            name: "highlightedCityDistricts"
        })
    );

    // Populate this series with data for the city districts we want to show
    cityDistrictMapping.forEach(cityInfo => {
        highlightedCityDistrictsSeries.data.push({
            id: cityInfo.districtId, // This ID must match a polygon ID in am5geodata_pakistanLow
            name: cityInfo.name,     // Tooltip name, e.g., "Lahore"
            fill: cityInfo.color     // Specific color for this city's district area
        });
    });

    // Template for the polygons in the highlighted series
    highlightedCityDistrictsSeries.mapPolygons.template.setAll({
        // The 'fill' is set dynamically by the adapter below based on data
        tooltipText: "{name}", // Shows "Lahore", "Multan", etc.
        interactive: true,
        stroke: am5.color(0xFFFFFF), // White border for highlighted city districts
        strokeWidth: 1.5, // Thicker border to make them stand out
        cursorOverStyle: "pointer",
    });

    // Adapter to apply the specific 'fill' color from our data to each polygon
    highlightedCityDistrictsSeries.mapPolygons.template.adapters.add("fill", function(fill, target) {
      if (target.dataItem && target.dataItem.dataContext && target.dataItem.dataContext.fill) {
        return target.dataItem.dataContext.fill; // Use color from cityDistrictMapping
      }
      return am5.color(0xCCCCCC); // Fallback color if none specified (shouldn't happen here)
    });

    // Hover state for highlighted city districts
    highlightedCityDistrictsSeries.mapPolygons.template.states.create("hover", {
        // Example: Slightly brighten or change stroke on hover
        // fillOpacity: 0.8, // Or use an adapter for hover fill too
        strokeWidth: 2.5,
        stroke: am5.color(0x333333)
    });

    // Click event for highlighted city districts
    highlightedCityDistrictsSeries.mapPolygons.template.events.on("click", (ev) => {
        const cityName = ev.target.dataItem.dataContext.name; // Name from our mapping
        const districtId = ev.target.dataItem.dataContext.id;
        alert(`${cityName} (District ID: ${districtId})`);
        // You could zoom in further here, or show a modal with city-specific info
        // chart.zoomToDataItem(ev.target.dataItem);
    });


    return () => {
      if (rootRef.current) {
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