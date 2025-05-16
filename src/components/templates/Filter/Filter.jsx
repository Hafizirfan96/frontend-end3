import { useState } from "react";

const options = ["All", "Active", "Completed"];

const Filter = () => {
  const [isOpen, setIsOpen] = useState(false);
  const [selectedFilters, setSelectedFilters] = useState([]);

  const filters = ["Vegetarian", "Vegan", "Halal", "Non-Veg", "Gluten-Free"];

  const toggleDropdown = () => setIsOpen(!isOpen);

  const handleCheckboxChange = (filter) => {
    setSelectedFilters((prev) =>
      prev.includes(filter)
        ? prev.filter((item) => item !== filter)
        : [...prev, filter]
    );
  };

  return (
    <div className="relative w-64">
      {/* Filter Button */}
      <button
        onClick={toggleDropdown}
        className="w-full bg-gray-200 p-2 rounded-md flex justify-between items-center"
      >
        <span>Filters</span>
        <span className="text-gray-600">{isOpen ? "▲" : "▼"}</span>
      </button>

      {/* Dropdown */}
      {isOpen && (
        <div className="absolute w-full bg-white border shadow-lg mt-2 rounded-md z-10 p-3">
          {filters.map((filter) => (
            <label key={filter} className="flex items-center space-x-2 py-1">
              <input
                type="checkbox"
                checked={selectedFilters.includes(filter)}
                onChange={() => handleCheckboxChange(filter)}
                className="form-checkbox h-4 w-4 text-blue-600"
              />
              <span>{filter}</span>
            </label>
          ))}
        </div>
      )}
    </div>
  );
};
export default Filter;
