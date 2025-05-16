import React from "react";
import { MapContainer, TileLayer } from "react-leaflet";
import "leaflet/dist/leaflet.css";

const InteractiveMap = ({ filters }) => {
  return (
    <MapContainer
      center={[30.3753, 69.3451]}
      zoom={5}
      scrollWheelZoom={true}
      style={{ height: "80vh", width: "100%" }}
    >
      <TileLayer
        attribution="&copy; OpenStreetMap contributors"
        url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
      />
      {/* Later: Add GeoJSON here and color-code based on filters */}
    </MapContainer>
  );
};

export default InteractiveMap;
