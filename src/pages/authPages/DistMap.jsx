import React, { useLayoutEffect, useRef } from "react";
import * as am5 from "@amcharts/amcharts5";
import * as am5map from "@amcharts/amcharts5/map";
import am5themes_Animated from "@amcharts/amcharts5/themes/Animated";

// ENSURE THIS PATH IS CORRECT AND THE FILE CONTAINS PUNJAB DISTRICTS
import am5geodata_pakistanLow from "@amcharts/amcharts5-geodata/pakistanLow";

// Assuming these paths are correct for your project structure
import Header from "./DashboardPages/Components/Header"; // Replace with your actual path
import Footer from "./DashboardPages/Components/Footer"; // Replace with your actual path

// --- Data for Major City Districts to Highlight ---
// CRITICAL: YOU MUST VERIFY AND CORRECT THESE districtId VALUES
// They MUST exactly match the 'id' property of the district polygons
// in your am5geodata_pakistanLow.js file.
const cityDistrictMapping = [
  // Example: If Lahore District's ID in GeoJSON is "PK-PB-LHE", use that.
  { name: "Lahore", districtId: "VERIFY_LAHORE_DISTRICT_ID_IN_GEOJSON", color: am5.color(0xFF6F00) },
  { name: "Multan", districtId: "VERIFY_MULTAN_DISTRICT_ID_IN_GEOJSON", color: am5.color(0xAD1457) },
  { name: "Faisalabad", districtId: "VERIFY_FAISALABAD_DISTRICT_ID_IN_GEOJSON", color: am5.color(0x0277BD) },
  { name: "Rawalpindi", districtId: "VERIFY_RAWALPINDI_DISTRICT_ID_IN_GEOJSON", color: am5.color(0x2E7D32) },
  { name: "Gujranwala", districtId: "VERIFY_GUJRANWALA_DISTRICT_ID_IN_GEOJSON", color: am5.color(0x512DA8) },
  { name: "Sargodha", districtId: "VERIFY_SARGODHA_DISTRICT_ID_IN_GEOJSON", color: am5.color(0xC62828) },
  { name: "Bahawalpur", districtId: "VERIFY_BAHAWALPUR_DISTRICT_ID_IN_GEOJSON", color: am5.color(0x4527A0) },
  { name: "Sialkot", districtId: "VERIFY_SIALKOT_DISTRICT_ID_IN_GEOJSON", color: am5.color(0x00695C) },
  // Add more cities as needed, ensuring each 'districtId' is correct.
];


const DistMap = () => {
  const rootRef = useRef(null);

  useLayoutEffect(() => {
    // Dispose of previous root if it exists (e.g., on hot reload)
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

    // --- 1. Base Series for Punjab Province (as a background) ---
    let punjabProvinceSeries = chart.series.push(
      am5map.MapPolygonSeries.new(root, {
        geoJSON: am5geodata_pakistanLow, // Source of all polygons
        include: ["PK-PB"], // Only include the Punjab province polygon
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

    // --- 2. Series for Highlighting Specific City Districts ---
    // These will be the primary colored areas within Punjab.
    let highlightedCityDistrictsSeries = chart.series.push(
        am5map.MapPolygonSeries.new(root, {
            geoJSON: am5geodata_pakistanLow, // Source of all polygons
            name: "highlightedCityDistricts"
            // Note: We don't use `include` here because we are pushing specific data items.
        })
    );

    // Populate this series with data for the city districts we want to show
    const dataToPush = [];
    cityDistrictMapping.forEach(cityInfo => {
        // Basic check if districtId is a placeholder
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


    // Template for the polygons in the highlighted series
    highlightedCityDistrictsSeries.mapPolygons.template.setAll({
        // The 'fill' is set dynamically by the adapter below based on data
        tooltipText: "{name}", // Shows "Lahore", "Multan", etc.
        interactive: true,
        stroke: am5.color(0xFFFFFF), // White border for highlighted city districts
        strokeWidth: 1.5, // Thicker border to make them stand out
        cursorOverStyle: "pointer",
        // Add a default fill in case the adapter logic fails or data is missing fill
        // (though our data structure ensures 'fill' is present if 'id' is valid)
        fill: am5.color(0x000000) // Default to black if no specific fill is found (should be overridden)
    });

    // Adapter to apply the specific 'fill' color from our data to each polygon
    highlightedCityDistrictsSeries.mapPolygons.template.adapters.add("fill", function(fill, target) {
      if (target.dataItem && target.dataItem.dataContext && target.dataItem.dataContext.fill) {
        return target.dataItem.dataContext.fill; // Use color from cityDistrictMapping
      }
      // If for some reason a polygon is matched by ID but has no fill in data,
      // it will use the default fill set in template.setAll or this fallback.
      return am5.color(0xCCCCCC); // A neutral fallback color
    });

    // Hover state for highlighted city districts
    highlightedCityDistrictsSeries.mapPolygons.template.states.create("hover", {
        strokeWidth: 2.5,
        stroke: am5.color(0x333333) // Darker stroke on hover
    });

    // Click event for highlighted city districts
    highlightedCityDistrictsSeries.mapPolygons.template.events.on("click", (ev) => {
        const dataContext = ev.target.dataItem.dataContext;
        if (dataContext) {
            const cityName = dataContext.name;
            const districtId = dataContext.id;
            alert(`${cityName} (District ID: ${districtId})`);
        }
    });

    // Log after data is set (useful for debugging)
    // Wait for data to be processed
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
        rootRef.current = null; // Clear the ref
      }
    };
  }, []); // Empty dependency array means this runs once on mount and cleans up on unmount

  return (
    <div>
      <Header />
      <div className="Browse bg-[#478e51] mb-8 p-4">
        {/* Make sure text doesn't imply all districts are shown if they are not */}
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
