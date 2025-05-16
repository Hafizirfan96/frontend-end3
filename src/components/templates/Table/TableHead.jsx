import React from 'react'
import { FaSortUp, FaSortDown, FaSort } from 'react-icons/fa6';
const initHead = [{
    title: "",
    sortValue: "",
}]
const TableHead = ({ heads = [], theadClassName = "", trClassName = "", setPagination, pagination, props }) => {

    const sortHandler = (title) => {
        let obj = { ...pagination }
        if (pagination.sortValue !== title) {
            obj.sortOrder = "acc",
                obj.sortValue = title
        }
        if (pagination.sortValue == title && pagination.sortOrder === "acc") {
            obj.sortOrder = "dcc"
        }
        if (pagination.sortValue == title && pagination.sortOrder === "dcc") {
            obj.sortOrder = ""
            obj.sortValue = ""
        }
        setPagination(obj)
    }

    return (
        <thead className={`border-b dark:border-cs-light bg-gray-50 dark:bg-gray-800 ${theadClassName}`}>
            <tr className={`${trClassName}`}>
                {heads?.length > 0 && heads?.map((x, i) => {
                    return (<th
                        onClick={() => {
                            sortHandler(x.sortValue)
                        }}
                        key={i} className={`text-nowrap px-5 py-7 text-xl h-text text-left  ${x?.className ? x?.className : ""} `} {...props}>

                        {x?.sortValue && <div className="flex items-center gap-2 cursor-pointer" onClick={() => { sortHandler("title") }}>
                            {pagination.sortValue == x.sortValue && pagination.sortOrder == "acc" ? <FaSortUp /> :
                                pagination.sortValue == x.sortValue && pagination.sortOrder == "dcc" ? <FaSortDown /> :
                                    <FaSort />}
                            {x?.title}
                        </div>}
                        {!x?.sortValue && x?.title}
                    </th>);
                })}
            </tr>
        </thead>
    )
}

export default TableHead