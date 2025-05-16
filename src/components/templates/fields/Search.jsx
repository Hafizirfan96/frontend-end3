import { useEffect, useRef, useState } from "react";
import { FaSearch } from "react-icons/fa";

const Search = ({ searchQuery, setSearchQuery }) => {
    const [isSearchOpen, setIsSearchOpen] = useState(false);
    const containerRef = useRef(null);
    const inputRef = useRef(null);

    const searchToggleHandler = () =>{inputRef.current.focus();  setIsSearchOpen(true);}
    const searchHandler = (e) => setSearchQuery(e.target.value || "");

    useEffect(() => {
        const handleClickOutside = (event) => {
            if (containerRef.current && !containerRef.current.contains(event.target)) {
                setIsSearchOpen(false);
            }
        };

        document.addEventListener("mousedown", handleClickOutside);
        return () => document.removeEventListener("mousedown", handleClickOutside);
    }, []);

    return (
        <div ref={containerRef} className="relative">
            <div
                onClick={searchToggleHandler}
                className={`${isSearchOpen ? "border" : "p-bg"} flex rounded-lg items-center cursor-pointer text-xl duration-500`}
            >
                <span className={`${isSearchOpen ? "pl-7 pr-5" : "px-7"} duration-500`}>
                    <FaSearch className={`${isSearchOpen ? "p-text" : "b-fg"}`} />
                </span>
                <input
                    onChange={searchHandler}
                    onBlur={()=>{setIsSearchOpen(false)}}
                    ref={inputRef}
                    type="text"
                    placeholder="Search..."
                    className={`${isSearchOpen ? "w-80" : "w-0"} py-6 focus:outline-none duration-500 bg-transparent`}
                />
            </div>
        </div>
    );
};

export default Search;
