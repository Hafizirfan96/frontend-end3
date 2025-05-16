import React from "react";

const FiltersPanel = ({ filters, setFilters }) => {
  const handleChange = (e) => {
    setFilters({ ...filters, [e.target.name]: e.target.value });
  };

  return (
    <div className="space-y-4">
      <div>
        <label className="block text-sm font-medium">Province</label>
        <select name="province" value={filters.province} onChange={handleChange} className="w-full border rounded p-2">
          <option value="">All</option>
          <option value="Punjab">Punjab</option>
          <option value="Sindh">Sindh</option>
          {/* Add other provinces */}
        </select>
      </div>

      <div>
        <label className="block text-sm font-medium">Gender</label>
        <select name="gender" value={filters.gender} onChange={handleChange} className="w-full border rounded p-2">
          <option value="">All</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
      </div>

      <div>
        <label className="block text-sm font-medium">Industry</label>
        <select name="industry" value={filters.industry} onChange={handleChange} className="w-full border rounded p-2">
          <option value="">All</option>
          <option value="IT">IT</option>
          <option value="Construction">Construction</option>
        </select>
      </div>
    </div>
  );
};

export default FiltersPanel;
