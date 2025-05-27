import "swiper/css";
import "swiper/css/pagination";
import "swiper/css/navigation";
import "swiper/swiper-bundle.css";
import giz from "@/assets/giz.png";
import pvtc from "@/assets/pvtc.jpg";
import psdf from "@/assets/psdf.jpg";
import pbte from "@/assets/pbte.jpg";
import slide2 from "@/assets/slide2.png";
import tevta1 from "@/assets/tevta1.png";
import psdalogo from "@/assets/psdalogo.png";
import SDED from "@/assets/logo.png";
import psdflogo from "@/assets/psdflogo.png";
import pvtclogo from "@/assets/pvtcalogo.jpeg";
import tevcalogo from "@/assets/tevcalogo.png";
import pbtelogo from "@/assets/pbtelogo.jpeg";
import {  useNavigate } from "react-router-dom";
import { Swiper, SwiperSlide } from "swiper/react";
import NationalSkills from "@/assets/NationalSkills.png";
import employementTrends from "@/assets/employementTrends.png";
import { Autoplay, Navigation, Pagination } from "swiper/modules";
import tvtproviders from "@/assets/tvtproviders.png";
import adnan from "@/assets/adnan.jpg";
import MaryamNawaz from "@/assets/Maryam-Nawaz.jpg";
import videoPreview from "@/assets/videopreview.mp4";
import SummeryCard from "@/components/templates/Home/SummeryCard";
import sectory from "@/assets/nadir.jpg";
import zahid from "@/assets/zahid.jpeg";
import TVETBodies from "@/components/templates/Home/TVETBodies";
import Xarrow from "react-xarrows";
import { useEffect, useRef, useState } from "react";
import Modal from "react-modal";
import React from "react";
import IndustoryInfoCard from "@/components/templates/Home/IndustoryInfoCard";
import Modals from "@/components/templates/modals/Modal";

Modal.setAppElement("#root");
const HomePage = () => {
  const showTvetSupply = false;
  const navigate = useNavigate();
  const navigatetoPages = (pages) => {
    navigate(pages);
  };
  const [showFull, setShowFull] = useState(false);
  const containerRef = useRef(null);

  const [showFulls, setShowFulls] = useState(false);
  const truncateLength = 600;
  const truncateLength1 = 630;

  // truncate text if not expanded
  const textContent = `The establishment of the Skills Development & Entrepreneurship
(SD&E) Department represents a strategic advancement in Punjab’s
human capital development agenda. This pioneering initiative
brings a comprehensive, sector-wide focus to technical and
vocational education and training (TVET), aimed at enhancing
workforce readiness, promoting inclusive participation, and
catalyzing entrepreneurial ecosystems. By integrating diverse
programs, including international labor mobility, skills training
for rural women and transgender individuals, and enterprise
development, we are addressing critical skills gaps and creating
pathways to sustainable livelihoods. Our department is committed
to aligning skills provision with labor market demands, both
domestically and globally, while fostering innovation and self
employment.

As we move forward, we envision a TVET landscape that is
responsive, inclusive, and future focused. I invite all
stakeholders industry partners, training providers, development
agencies, and communities to collaborate with us in shaping a
skilled and empowered Punjab.`;

  const displayedText = showFulls
    ? textContent
    : textContent.slice(0, truncateLength) + "...";
  // const textContent1 = ` The Skills Development and Entrepreneurship Department created by
  //             the Punjab Government on 13.01.2025 is responsible for
  //             co-ordination of all Skills development efforts across the
  //             country, removal of disconnect between demand and supply of
  //             skilled manpower both at local and international levels, building
  //             the vocational and technical training framework, skills up
  //             gradation, building of new skills and innovative thinking not only
  //             for existing jobs but also jobs that are to be created. The new
  //             department aims to impart skills on a large scale with speed and
  //             high standards in order to achieve its vision of a 'Skilled
  //             Punjab'. The CM initiatives by its functional arms i.e. Tevta,
  //             PSDF and PVTC will go a long way in achieving the goals for which
  //             this department was established. The Department also intends to
  //             work with the existing network of Skills Development centres,
  //             universities, industry and other alliances in the field. Further,
  //             collaborations with relevant governmental institutions,
  //             international organizations, industry and NGOs have been initiated
  //             for multi-level engagement and more impactful implementation of
  //             Skill Development efforts.
  //             <br />
  //             SDED Vision Statement Unlock human capital to trigger a
  //             productivity dividend and bring aspirational employment and
  //             entrepreneurship pathways to all. For this, an ecosystem-enabling
  //             lens to transition Punjab to a high-skills equilibrium and help
  //             create positive outcomes for individuals, enterprises and the
  //             economy. The three outcomes to be achieved through: Enable
  //             individual economic gains and social mobility; Create a skills
  //             market that is learner-centric and demand-driven; and Facilitate
  //             aspirational employment and entrepreneurship generation, improve
  //             overall productivity for enterprises and catalyse economic growth.`;

  const textContent1 =`Established by the Government of Punjab on January 13, 2025, the Skills Development and Entrepreneurship Department (SDED) is mandated to streamline and lead skill development efforts across the province. It aims to bridge the demand-supply gap in skilled manpower, both locally and internationally, by upgrading vocational training, promoting innovation, and preparing the workforce for future job markets.
Through its key institutions, TEVTA, PSDF, and PVTC, SDED delivers high-quality, scalable training aligned with industry needs. The department works closely with skill centres, universities, industry partners, government bodies, NGOs, and international organizations to foster multi-level collaboration.
With a strong ecosystem-enabling approach, SDED seeks to unlock human capital, empower individuals, and catalyse aspirational employment, entrepreneurship, and productivity-led economic growth, steering Punjab toward a high-skills future.`
  const displayedText1 = showFull
    ? textContent1
    : textContent1.slice(0, truncateLength1) + "...";

  const slidesData = [
    {
      // id: "/tvet-supply",
      image: NationalSkills,
      title: "Punjab Skills Information System (PSIS)",
      description:
        "With the establishment of PSIS, Government of Punjab is able to take stock of their capacity to produce and use skill information for evidence-based decision making at different levels. The system is helpful to formulate informed policies to duly adjust the demand and supply of skills ro make the TVET landscape better able to address the national and provincial unemployment challenges. ",
      buttonLabel: "Explore More",
      tab: "opportunities",
    },

    {
      id: "/tevta-page",
      image: tevta1,
      title: "Technical Education and Vocational Training Authority (TEVTA)",
      description:
        "TEVTA is a leading partner in the development of the Punjab by empowering youth through technical education and vocational training. It endeavors to enhance equal opportunities of employability for youth at home and abroad. It strives well to open new horizons of professional skills to equip the youth to meet challenges of globalization. ",
      buttonLabel: "Discover More",
      tab: "opportunities",
    },

    {
      id: "/pvtc-page",
      image: pvtc,
      title: "Punjab Vocational Training Council (PVTC)",
      description:
        "Punjab Vocational Training Council (PVTC) is largest vocational training provider in Pakistan and have presence in all Sub-Districts (Tehsils) of Punjab - Pakistan. PVTC's primary goal is to provide professional vocational training to needy youth in Punjab, exceeding student expectations, and empowering them with skills to earn a reasonable living.",
      buttonLabel: "Explore More",
      tab: "opportunities",
    },
    {
      // id: "/psda-page",
      image: slide2,
      title: "Punjab Skills Development Authority (PSDA)",
      description:
        "The Punjab Skills Development Authority (PSDA) is a regulatory body established in Punjab, Pakistan, to oversee the skills sector. Its primary objective is to ensure quality training and a skilled workforce by regulating and managing Technical and Vocational Education and Training (TVET) institutions, implementing national policies, and connecting supply with demand in the skills market.",

      //comment at the end  To promote and regulate technical education and vocational training sector in all over Punjab.

      buttonLabel: "Discover More",
      tab: "opportunities",
    },
    {
      id: "/psdf-page",
      image: psdf,
      title: "Punjab Skills Development Fund (PSDF)",
      description:
        "PSDF was set up in 2010 as Pakistan’s largest skills development fund. It funds training for over 80,000 youth every year in 250+ demand-driven trades through an ecosystem of 500+ private sector training partners. Through PSDF, thousands of young men and women now have the skills they need to pursue their careers of choice.",
      buttonLabel: "Discover More",
      tab: "opportunities",
    },
    {
      // id: "/employment-projections",
      image: pbte,
      title: "Punjab Board of Technical Education (PBTE)",
      description:
        "PBTE is a corporate body responsible to conduct the examinations of technical, commerce & vocational streams as well as the Short Courses below degree level in the territorial limits of the Province of Punjab under the provision of PBTE ACT, 1977. PBTE is striving to adapt the curricula based on competencies to meet the requirements of National Vocational Qualification Framework (NVQF).",
      buttonLabel: "Discover More",
      tab: "opportunities",
    },
    {
      id: "/employment-projections",
      image: slide2,
      title: "Employment Projections",
      description:
        "Evolving local and global employment trends that help understand shifting workforce dynamics have been drawn from a range of local reputable sources, as well as from the database of Bureau of Emigration and Overseas Employment for overseas employment opportunities. Information on gender-wise jobs, job listings in various technical fields, top occupations, regional stats, etc. provide a TVET jobs landscape. These insights will help the policy makers. ",
      buttonLabel: "Discover More",
      tab: "opportunities",
    },
    {
      id: "/tvet-supply",
      image: slide2,
      title: "TVET Supply",
      description:
        "Statistics related to institutes, enrollment capacities, student-teacher ratios, graduate outcomes, and geographic distribution of facilities help develop insights for sectoral policy making for addressing supply-side needs and develop strategies that strengthen TVET sector workforce. Key outcomes of informed decision making include improved quality standards and programmes that are better aligned with market needs. ",
      buttonLabel: "See Supply",
      tab: "opportunities",
    },
    {
      id: "/institutes",
      image: tvtproviders,
      title: "TVET Providers",
      description: ` Career advisers for the youth looking to upskill or reskill
                      themselves.They can find pertinent information on institutes,
                      enrollment processes, gender distribution, faculty, institution
                      types and a lot other valueable information. A comprehensive picture is presented with
                      respect to the TVET providing institutes from both private
                      and public sectors according to their distribution across
                      districts. The bird’s eye view, inter alia,
                      helps provide a basis to address pertinent regional needs
                      for TVET institution.`,
      buttonLabel: "See Providers",
      tab: "institutes",
    },
    // {
    //   id: "/institutes",
    //   image: TopAchievers,
    //   title: "Skills Opportunities",
    //   description:
    //     "Explore a wide horizon of training opportunities and certifications across industries both at local and global level. With ever changing world, the process of leraning, de-leraning and re-learning has become much more important to stay relevant in the TVET world. Skills Punjab takes the aspirants to the training avenues that are not only the most relevant but also the most meanningful. New and varied opportinities as per proclivities of the students is just round the corner with us. ",
    //   buttonLabel: "Explore Now",
    //   tab: "opportunities",
    // },
    {
      id: "/jobs",
      image: employementTrends,
      title: "Employment Trends ",
      description:
        "Get information that facilitates forecasting and future projections for determining skilled workforce requirements of all regions and districts. Drawn from employer skill surveys and government data, projections included in this page offer a realistic view of evolving TVET sector needs. The information will better equip TVET providers, policy makers, and planners in devising future education and training programmes for skilling youth for the job market with better alignment with sectoral and Industry needs.  ",
      buttonLabel: "See Jobs",
      tab: "opportunities",
    },
  ];
  const slidessmall = [
    // {
    //   id: "/tevta-page",
    //   image: shahbaz,
    //   title: "Mian Muhammad Shehbaz Sharif",
    //   description: "Prime Minister of Pakistan",
    //   link: "Read More",
    //   tab: "opportunities",
    // },
    {
      id: "/profile-detail",
      image: adnan,
      title: "Mr. Adnan Afzal Chattha",
      description:
        "Chairperson, Chief Minister's Task Force on Skills Development",
      link: "Read More",
      tab: "opportunities",
    },
  ];
  const totelSites = (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 640 512"
      fill="#267d37de"
    >
      <path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192l42.7 0c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0L21.3 320C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7l42.7 0C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3l-213.3 0zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352l117.3 0C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7l-330.7 0c-14.7 0-26.7-11.9-26.7-26.7z"></path>
    </svg>
  );
  const enrolledIcon = (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 640 512"
      fill="#267d37de"
    >
      <path d="M96 128a64 64 0 1 0 0-128 64 64 0 0 0 0 128zm224 0a64 64 0 1 0 0-128 64 64 0 0 0 0 128zM96 160C43 160 0 203 0 256v48c0 8.8 7.2 16 16 16h160v-64h64v64h160c8.8 0 16-7.2 16-16v-48c0-53-43-96-96-96H96zm224 0c-22.1 0-42.5 7.1-59.2 19H352c53 0 96 43 96 96v48c0 17.7-14.3 32-32 32h-49.6c-7.5-18.6-25.8-32-47.4-32s-39.9 13.4-47.4 32H176c-17.7 0-32-14.3-32-32v-48c0-53 43-96 96-96h80z" />
    </svg>
  );

  const totelGratudes = (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 640 512"
      fill="#267d37de"
    >
      <path d="M320 32L0 160l320 128 320-128L320 32zm0 288c-35.3 0-64 28.7-64 64v96h128v-96c0-35.3-28.7-64-64-64z" />
    </svg>
  );

  const totelPlacement = (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 640 512"
      fill="#267d37de"
    >
      <path d="M464 128h-80V96c0-35.3-28.7-64-64-64H192c-35.3 0-64 28.7-64 64v32H48C21.5 128 0 149.5 0 176v272c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48V176c0-26.5-21.5-48-48-48zM192 96c0-17.7 14.3-32 32-32h128c17.7 0 32 14.3 32 32v32H192V96zm272 352H48V176h416v272z" />
    </svg>
  );
  const totelEmploymentTrends = (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 640 512"
      fill="#267d37de"
    >
      <path d="M320 336c0 8.8-7.2 16-16 16h-96c-8.8 0-16-7.2-16-16v-48H0v144c0 25.6 22.4 48 48 48h416c25.6 0 48-22.4 48-48V288H320v48zm144-208h-80V80c0-25.6-22.4-48-48-48H176c-25.6 0-48 22.4-48 48v48H48c-25.6 0-48 22.4-48 48v80h512v-80c0-25.6-22.4-48-48-48zm-144 0H192V96h128v32z"></path>
    </svg>
  );

  const emloymentProjection = (
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 512 512"
      fill="#267d37de"
    >
      <path d="M496 384H64V80c0-8.8-7.2-16-16-16H16C7.2 64 0 71.2 0 80v336c0 17.7 14.3 32 32 32h464c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zM464 96H345.9c-21.4 0-32.1 25.9-17 41l32.4 32.4L288 242.8l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0l-68.7 68.7c-6.3 6.3-6.3 16.4 0 22.6l22.6 22.6c6.3 6.3 16.4 6.3 22.6 0L192 237.3l73.4 73.4c12.5 12.5 32.8 12.5 45.3 0l96-96 32.4 32.4c15.1 15.1 41 4.4 41-17V112c0-8.8-7.2-16-16-16z"></path>
    </svg>
  );

  const [showArrow, setShowArrow] = useState(false);

  useEffect(() => {
    setShowArrow(true);
  }, []);

  const pageMap = {
    PSDA: "https://psda.punjab.gov.pk",
    // SDED: 'https://example.com/sded',
    PBTE: "https://www.pbte.edu.pk",
    PSDF: "https://www.psdf.org.pk",
    PVTC: "http://pvtc.gop.pk",
    TEVTA: "https://tevta.gop.pk",
  };

  const navigateToTivetBody = (text) => {
    const url = pageMap[text];
    if (url) {
      window.open(url, "_blank");
    }
  };
  const navigateToDetail = () => {
    navigate("/profile-detail");
  };

  const customStyles = {
    overlay: { backgroundColor: "rgba(0, 0, 0, 0.75)" },
    content: {
      inset: "10% auto auto 10%",
      width: "80%",
      maxWidth: "800px",
      height: "auto",
      padding: 0,
      border: "none",
      background: "transparent",
      overflow: "visible",
    },
  };
  const [modalIsOpen, setModalIsOpen] = useState(false);
  const videoRef = useRef(null);

  const openModal = () => setModalIsOpen(true);
  const closeModal = () => setModalIsOpen(false);

  useEffect(() => {
    if (modalIsOpen) {
      document.body.style.overflow = "hidden";
    } else {
      document.body.style.overflow = "auto";
    }

    return () => {
      document.body.style.overflow = "auto";
    };
  }, [modalIsOpen]);

  useEffect(() => {
    if (!modalIsOpen && videoRef.current) {
      videoRef.current.pause();
    }
  }, [modalIsOpen]);

  const toggleText = () => {
    setShowFull((prev) => {
      const newShowFull = !prev;
      if (!newShowFull && containerRef.current) {
        containerRef.current.scrollIntoView({
          behavior: "smooth",
          block: "start",
        });
      }

      return newShowFull;
    });
  };

  const [isModalOpen, setModalOpen] = useState(false);

  const pageNavigate = {
    Graduate: "/for-graduate",
    Employer: "/for-employer",
    ForLearner: () => setModalOpen(true),
    PVTC: "http://pvtc.gop.pk",
    TEVTA: "https://tevta.gop.pk",
  };
  const navigateToIndustry = (text) => {
    const action = pageNavigate[text];

    if (!action) return;

    if (typeof action === "string") {
      navigate(action);
    } else if (typeof action === "function") {
      action();
    }
  };

  return (
    <div>
      <div className="flex px-20 bg-[#f0f0f0]">
        <div className="w-1/2 text-center px-8 justify-center">
          <h3 className="text-[25px] font-bold ">
            Maryam Nawaz Sharif, Chief Minister Punjab{" "}
          </h3>
          <h3
            className="text-justify text-3xl text-slate-700 mt-4 leading-relaxed tracking-tight"
            style={{
              textAlign: "justify",
              textJustify: "inter-word",
            }}
          >
            Chief Minister Punjab Maryam Nawaz Sharif envisions transforming the
            province into a hub of skilled talent, innovation, and economic
            prosperity. With her dynamic leadership and unwavering commitment to
            progress, she has established the Skills Development &
            Entrepreneurship (SD&E) Department to empower diverse communities
            through inclusive and future-ready skill development programs. These
            initiatives encompass international labor placement, transgender
            skill training, rural women’s empowerment, and specialized programs
            designed to bridge skill gaps and foster entrepreneurship. Under her
            visionary guidance, Punjab is paving the way for a skilled,
            self-reliant, and economically vibrant future.
          </h3>
          <h3 className="text-[35px] font-bold  text-[#049b63] mt-6">
            Skilling Punjab
          </h3>
          <h3 className="text-[30px] font-bold ">
            Igniting Potential In Youth, Women, and all Communities for
            Productive Future
          </h3>
        </div>
        <div className="w-1/2 mr-8 py-4">
          <img
            src={MaryamNawaz}
            alt="Maryam Nawaz Sharif"
            className="w-full h-auto"
          />
        </div>
      </div>

      <div className="flex flex-col lg:flex-row mt-14">
        {/* Left (Main Swiper) */}
        <div className="w-full lg:w-[70%] relative flex justify-center  ">
          <Swiper
            spaceBetween={20}
            slidesPerView={1}
            modules={[Autoplay, Navigation, Pagination]}
            autoplay={{
              delay: 5000,
              disableOnInteraction: false,
            }}
            navigation={{
              nextEl: ".custom-next",
              prevEl: ".custom-prev",
            }}
            pagination={{ clickable: true }}
            className="w-full z-0"
          >
            {slidesData.map((item, index) => (
              <SwiperSlide
                key={index}
                className="bg-white shadow-md rounded-xl"
              >
                <div className="flex flex-col md:flex-row px-10 py-10 bg-[#049b63] h-[400px]">
                  <div className="w-full md:w-1/3 mb-6 md:mb-0">
                    <img
                      className="w-full h-full max-h-[300px] object-contain ml-8"
                      src={item.image}
                      alt={`Slide ${index + 1}`}
                    />
                  </div>
                  <div className="w-full md:w-[55%] mt-5 md:mt-0 md:pl-20 ml-8 overflow-y-auto">
                    <h3 className="text-white text-[21px] font-semibold">
                      {item.title}
                    </h3>
                    <div className="py-5">
                      <p
                        className="text-white text-2xl leading-relaxed"
                        style={{
                          textAlign: "justify",
                          textJustify: "inter-word",
                        }}
                      >
                        {item.description}
                      </p>
                    </div>
                    <a
                      onClick={() => navigatetoPages(item.id)}
                      className="cursor-pointer inline-block bg-yellow-500 hover:bg-yellow-600 text-black text-2xl font-medium px-5 py-4 rounded mt-4 transition"
                    >
                      {item.buttonLabel}
                    </a>
                  </div>
                </div>
              </SwiperSlide>
            ))}
          </Swiper>
          <style jsx>{`
            .swiper-pagination-bullet {
              width: 12px;
              height: 12px;
              background-color: #fff;
            }

            .swiper-pagination-bullet-active {
              background-color: #ffcc00; /* Customize active color */
              transform: scale(1.5); /* Increase size of active bullet */
            }
          `}</style>

          <div className="custom-prev absolute left-2 top-1/2 transform -translate-y-1/2 z-10">
            <button className="w-12 h-12 md:w-16 md:h-16 text-2xl md:text-3xl text-yellow-500 bg-black/50 hover:bg-black/70 rounded-full transition flex items-center justify-center">
              &#10094;
            </button>
          </div>
          <div className="custom-next absolute right-2 top-1/2 transform -translate-y-1/2 z-10">
            <button className="w-12 h-12 md:w-16 md:h-16 text-2xl md:text-3xl text-yellow-500 bg-black/50 hover:bg-black/70 rounded-full transition flex items-center justify-center">
              &#10095;
            </button>
          </div>
        </div>

        {/* Right (TVET Structure + Mini Swiper) */}
        <div className="w-full lg:w-[30%] bg-[#f0f0f0]  px-4">
          <div className="text-xl md:text-3xl text-center text-blue-900 font-bold py-4">
            <h3>Administrative Structure of SDED</h3>
          </div>
          <div className="relative w-full px-2">
            <div className="grid grid-cols-2 md:grid-cols-3 gap-y-10 gap-x-4">
              <TVETBodies
                image={tevcalogo}
                title="TEVTA"
                bgColor="bg-[#1e293c]"
                id="box1"
                onClick={() => navigateToTivetBody("TEVTA")}
              />
              <TVETBodies
                image={SDED}
                title="SDED"
                bgColor="bg-[#004614]"
                id="box2"
                onClick={() => navigateToTivetBody("SDED")}
              />
              <TVETBodies
                image={psdalogo}
                title="PSDA"
                bgColor="bg-green-600"
                id="box3"
                onClick={() => navigateToTivetBody("PSDA")}
              />
              <TVETBodies
                image={pbtelogo}
                title="PBTE"
                bgColor="bg-indigo-600"
                id="box4"
                onClick={() => navigateToTivetBody("PBTE")}
              />
              <TVETBodies
                image={pvtclogo}
                title="PVTC"
                bgColor="bg-slate-700"
                id="box5"
                onClick={() => navigateToTivetBody("PVTC")}
              />
              <TVETBodies
                image={psdflogo}
                title="PSDF"
                bgColor="bg-orange-500"
                id="box6"
                onClick={() => navigateToTivetBody("PSDF")}
              />
            </div>

            {/* Arrows */}
            {showArrow && (
              <>
                <Xarrow
                  start="box2"
                  end="box1"
                  startAnchor="left"
                  endAnchor="right"
                  path="grid"
                  headSize={6}
                  color="black"
                  strokeWidth={2}
                />
                <Xarrow
                  start="box2"
                  end="box3"
                  startAnchor="right"
                  endAnchor="left"
                  path="grid"
                  headSize={6}
                  color="black"
                  strokeWidth={2}
                />
                <Xarrow
                  start="box2"
                  end="box4"
                  startAnchor="bottom"
                  endAnchor="top"
                  path="grid"
                  headSize={6}
                  color="black"
                  strokeWidth={2}
                />
                <Xarrow
                  start="box2"
                  end="box5"
                  startAnchor="bottom"
                  endAnchor="top"
                  path="grid"
                  headSize={6}
                  color="black"
                  strokeWidth={2}
                />
                <Xarrow
                  start="box2"
                  end="box6"
                  startAnchor="bottom"
                  endAnchor="top"
                  path="grid"
                  headSize={6}
                  color="black"
                  strokeWidth={2}
                />
              </>
            )}
          </div>

          {/* Mini Swiper */}
          <div className="relative mt-6">
            <Swiper
              modules={[Autoplay, Navigation]}
              autoplay={{
                delay: 3000,
                disableOnInteraction: false,
              }}
              navigation
              pagination={{ clickable: true }}
              className="w-full z-0"
            >
              {slidessmall.map((item, index) => (
                <SwiperSlide key={index} className="bg-white shadow-md">
                  <div className="flex flex-col md:flex-row gap-4 items-center md:items-start p-4">
                    <img
                      src={item.image}
                      className="w-28 h-28 md:w-36 md:h-44 rounded-full object-cover"
                      alt="Profile picture"
                    />
                    <div>
                      <h4 className="text-xl md:text-2xl font-semibold">
                        {item.title}, {item.description}
                      </h4>
                      {/* <p className="text-base md:text-xl mt-2">
                        Chief Minister Punjab Maryam Nawaz Sharif envisions
                        transforming the province into...
                      </p> */}
                      <button
                        onClick={navigateToDetail}
                        className="mt-4 px-4 py-2 border text-sm md:text-base rounded"
                      >
                        {item.link}
                      </button>
                    </div>
                  </div>
                </SwiperSlide>
              ))}
            </Swiper>
          </div>
        </div>
      </div>

      <div className="bg-gray-100 mt-8 py-10 px-20 sm:px-6 lg:px-24 overflow-x-auto flex">
        <div className="flex gap-6">
          <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 min-w-[1000px]">
            <IndustoryInfoCard
              onClick={() => navigateToIndustry("Graduate")}
              title="For Graduates & Workers"
              icon={
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 640 512"
                  fill="#267d37de"
                  width={50}
                  height={50}
                >
                  <path d="M320 32c-79.5 0-144 64.5-144 144s64.5 144 144 144 144-64.5 144-144S399.5 32 320 32zM144 448c0-61.9 50.1-112 112-112h128c61.9 0 112 50.1 112 112 0 17.7-14.3 32-32 32H176c-17.7 0-32-14.3-32-32zM32 96h64v64H32V96zm0 96h64v64H32v-64zM32 288h64v64H32v-64zm0 96h64v64H32v-64z" />
                </svg>
              }
            />

            <IndustoryInfoCard
              onClick={() => navigateToIndustry("Employer")}
              title="For industry & Employers"
              icon={
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 640 512"
                  fill="#267d37de"
                  width={50}
                  height={50}
                >
                  <path d="M496 224V96h-96v48L336 96v48L240 96v384h400V224H496zM544 400h-32v-32h32v32zm0-64h-32v-32h32v32zm-64 64h-32v-32h32v32zm0-64h-32v-32h32v32zM64 160v304h128V320h64v144h32V192l-80 60v-60l-80 60v-60H64z" />
                </svg>
              }
            />

            <IndustoryInfoCard
              onClick={() => navigateToIndustry("ForLearner")}
              title="For Learners"
              icon={
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 640 512"
                  fill="#267d37de"
                  width={50}
                  height={50}
                >
                  <path d="M320 32L0 160l320 128 192-76.8V352c0 17.7 14.3 32 32 32h32c17.7 0 32-14.3 32-32V211.2l32-12.8V384H640V160L320 32zm0 256L64 192v32l256 102.4L576 224v-32L320 288z" />
                </svg>
              }
            />

            <IndustoryInfoCard
              // onClick={() => navigateToIndustry("Graduate")}
              title="For Institutes"
              icon={
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 576 512"
                  fill="#267d37de"
                  width={50}
                  height={50}
                >
                  <path d="M288 0C293.5 0 299 1.7 304 5l256 160c7.1 4.4 11.3 12 11.3 20s-4.3 15.6-11.3 20L304 365c-5 3.3-10.5 5-16 5s-11-1.7-16-5L16 205C8.9 200.6 4.7 193 4.7 185S8.9 169.4 16 165L272 5c5-3.3 10.5-5 16-5zM80 240h32v176H80V240zm96 0h32v176h-32V240zm96 0h32v176h-32V240zm96 0h32v176h-32V240zm96 0h32v176h-32V240zM0 464c0-8.8 7.2-16 16-16H560c8.8 0 16 7.2 16 16v32H0v-32z" />
                </svg>
              }
            />
          </div>
          <div className="bg-white shadow-md rounded-2xl  hover:shadow-xl transition duration-300 text-center w-[400px] sm:w-[500px]  flex-shrink-0">
            <div className="flex flex-col items-center">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 640 512"
                fill="#267d37de"
                width={50}
                height={50}
              >
                <path d="M501.6 210.4c16.1-23.5 24.4-51.5 22.5-80.6-3.9-58.9-53.3-107.3-112.2-110.3-40.3-2.1-76.3 16.5-98.2 46.5L282.4 67c-8.7-6.9-19.6-10.9-31.2-10.9h-80c-26.5 0-48 21.5-48 48v48h-48c-26.5 0-48 21.5-48 48v160c0 26.5 21.5 48 48 48h48v48c0 26.5 21.5 48 48 48h80c11.5 0 22.5-4 31.2-10.9l31.3 1c21.9 30 57.9 48.6 98.2 46.5 58.9-3 108.3-51.4 112.2-110.3 1.9-29.1-6.4-57.1-22.5-80.6 16.1-23.5 24.4-51.5 22.5-80.6zM336 416h-32v-96h32v96zm0-160h-32V160h32v96z" />
              </svg>
              <h3 className="text-3xl font-bold text-gray-800 mt-4">
                For TVET Stackholders
                <h3 className="text-3xl font-semibold text-gray-800 mt-2">
                  Punjab Skills information system(PSIS)
                </h3>
                <h3 className="text-2xl font-semibold text-gray-800 mt-4">
                  " Empowering Data-Driven TVET Sector Reforms "
                </h3>
              </h3>
            </div>
          </div>
        </div>
      </div>

      {/* <div className="bg-gray-100 mt-8 py-10 px-20 sm:px-6 lg:px-24 overflow-x-auto flex">
        <div className="flex gap-6">
          <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 min-w-[1000px]">
            <div className=" rounded-2xl   text-center">
              <div className="flex flex-col items-center">
                <h3 className="text-3xl font-bold text-gray-800">Vision</h3>
                <h3 className="text-3xl font-bold text-gray-800">
                  The transformational leader in the technical education and
                  skills development of the Filipino workforce.
                </h3>
              </div>
            </div>
          </div>
          <div className="bg-white  rounded-2xl  hover:shadow-xl transition duration-300 text-center w-[400px] sm:w-[500px]  flex-shrink-0"></div>
        </div>
      </div> */}

      <div className=" mx-auto flex px-20 mt-10 gap-6 bg-[#f0f0f0] py-8">
        <div className="flex-1 p-4" ref={containerRef}>
          <div className="mx-auto max-w-3xl text-center">
            <h2 className="text-[30px] font-bold">Quick Look at SDED</h2>
            <button
              onClick={openModal}
              className="text-2xl text-blue-600 underline hover:text-blue-800 transition-colors duration-200"
            >
              Video Preview
            </button>

            <div
              className="max-w-[200px] h-[10px] mx-auto my-2 rounded-full"
              style={{
                background: "linear-gradient(90deg, #66cc66, #4caf50, #66cc66)",
                clipPath: "ellipse(50% 25% at 50% 50%)",
              }}
            ></div>

            <h3
              className={`text-justify text-3xl text-slate-700 mt-4 leading-relaxed tracking-tight`}
            >
              {displayedText1}
            </h3>

            <button
              onClick={toggleText}
              className="mt-2 text-blue-600 underline hover:text-blue-800 transition-colors duration-200"
            >
              <h3 className="text-2xl">
                {showFull ? "Read less" : "Read more..."}
              </h3>
            </button>
          </div>
        </div>

        <div className="flex-1 p-4">
          <div className="flex-1 ">
            <div className="text-base sm:text-lg md:text-xl lg:text-2xl leading-relaxed">
              <img
                src={zahid}
                alt="Top Left"
                className=" tracking-tight text-justify m-0 text-xl float-left w-[150px] min-w-[150px] h-[150px]  mr-4 mb-2 rounded shadow-md"
              />
              <h3 className="text-4xl font-semibold hover:text-[#049b63] transition-colors duration-300 m-0">
                Zahid Akhtar Zaman, Chief Secretary Punjab
              </h3>
              <p
                style={{ wordSpacing: "normal" }}
                className="text-3xl text-slate-700 leading-relaxed tracking-tight text-justify m-0 mt-4"
              >
                The launch of the Skills Development & Entrepreneurship (SD&E)
                Department marks a historic milestone for Punjab, ushering in a
                new era of skill enhancement and economic empowerment. For the
                first time in the province’s history, a comprehensive initiative
                of this scale is being introduced, encompassing international
                labor placement, transgender training, rural women’s
                empowerment, and numerous other programs. This groundbreaking
                effort aims to bridge skill gaps, foster entrepreneurship, and
                drive inclusive growth, making Punjab a model of progress and
                self-reliance. A transformative leap towards a brighter, more
                empowered future!
              </p>
            </div>
          </div>
        </div>

        <div className="flex-1  p-4">
          <div className="text-base  sm:text-lg md:text-xl lg:text-2xl leading-relaxed">
            <img
              src={sectory}
              alt="Top Left"
              className="tracking-tight text-justify m-0 text-xl float-left w-[150px] min-w-[150px] h-[150px] mr-4 mb-2 rounded shadow-md"
            />
            <h3 className="text-4xl font-semibold hover:text-[#049b63] transition-colors duration-300 m-0">
              Nadir Chattha, Secretary SDED
            </h3>
            <p className="text-3xl text-slate-700 leading-relaxed tracking-tight text-justify m-0 mt-4 ">
              {displayedText}
            </p>
            <button
              onClick={() => setShowFulls((prev) => !prev)}
              className="mt-2 text-blue-600 underline hover:text-blue-800 transition-colors duration-200"
            >
              {showFulls ? (
                <h3 className="text-2xl">Read less</h3>
              ) : (
                <h3 className="text-2xl">Read more...</h3>
              )}
            </button>
          </div>
        </div>
      </div>

      <div className=" py-10 mt-16 ">
        <div className="gap-y-10 mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 px-20">
          <SummeryCard
            icon={totelSites}
            title="Institutes"
            number="4,659"
            // subtitle="Total Institutes"
          />
          <SummeryCard
            icon={enrolledIcon}
            title="Enrollments"
            number="303,659"
            // subtitle="Total Enrolled"
            bgColor="bg-white"
          />
          <SummeryCard
            icon={totelGratudes}
            title="Graduates"
            number="203,659"
            // subtitle="Total Graduate"
          />
          {/* <SummeryCard
            icon={totelAccessed}
            title="Assessed"
            number="457,654"
            subtitle="Total Assessed"
            bgColor="bg-white"
          /> */}

          <SummeryCard
            icon={totelPlacement}
            title="Placements"
            number="147,934"
            bgColor="bg-white"

            // subtitle="Total Placement"
          />
          <SummeryCard
            icon={totelEmploymentTrends}
            title="Employment Trends"
            number="147,934"
            subtitle="Jobs"
            // bgColor="bg-white"
          />
          <SummeryCard
            icon={emloymentProjection}
            title="Employment Projections"
            number="868,715"
            subtitle="Demand"
            bgColor="bg-white"
          />
        </div>
      </div>

      <div className="grid grid-cols-3 mt-8  ">
        {[
          {
            id: "/tvet-supply",
            title: "TVET Supply",
            description:
              "Explore insights on enrollments, gender, providers, and courses.",
            bgColor: "bg-teal-600",
            icon: (
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512"
                className="w-16 h-16 text-[#9dd8d0] opacity-90"
                fill="currentColor"
              >
                <path d="M332.8 320h38.4c6.4 0 12.8-6.4 12.8-12.8V172.8c0-6.4-6.4-12.8-12.8-12.8h-38.4c-6.4 0-12.8 6.4-12.8 12.8v134.4c0 6.4 6.4 12.8 12.8 12.8zm96 0h38.4c6.4 0 12.8-6.4 12.8-12.8V76.8c0-6.4-6.4-12.8-12.8-12.8h-38.4c-6.4 0-12.8 6.4-12.8 12.8v230.4c0 6.4 6.4 12.8 12.8 12.8zm-288 0h38.4c6.4 0 12.8-6.4 12.8-12.8v-70.4c0-6.4-6.4-12.8-12.8-12.8h-38.4c-6.4 0-12.8 6.4-12.8 12.8v70.4c0 6.4 6.4 12.8 12.8 12.8zm96 0h38.4c6.4 0 12.8-6.4 12.8-12.8V108.8c0-6.4-6.4-12.8-12.8-12.8h-38.4c-6.4 0-12.8 6.4-12.8 12.8v198.4c0 6.4 6.4 12.8 12.8 12.8zM496 384H64V80c0-8.8-7.2-16-16-16H16C7.2 64 0 71.2 0 80v336c0 17.7 14.3 32 32 32h464c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16z"></path>
              </svg>
            ),
          },
          // {
          //   id: "/tvet-supply",
          //   title: "Placement",
          //   description:
          //     "Explore insights on enrollments, gender, providers, and courses.",
          //   bgColor: "bg-blue-600",
          //   icon: (
          //     <svg
          //       xmlns="http://www.w3.org/2000/svg"
          //       viewBox="0 0 512 512"
          //       className="w-16 h-16 text-[#9dd8d0] opacity-90"
          //       fill="currentColor"
          //     >
          //       <path d="M320 336c0 8.8-7.2 16-16 16h-96c-8.8 0-16-7.2-16-16v-48H0v144c0 25.6 22.4 48 48 48h416c25.6 0 48-22.4 48-48V288H320v48zm144-208h-80V80c0-25.6-22.4-48-48-48H176c-25.6 0-48 22.4-48 48v48H48c-25.6 0-48 22.4-48 48v80h512v-80c0-25.6-22.4-48-48-48zm-144 0H192V96h128v32z"></path>
          //     </svg>
          //   ),
          // },
          {
            id: "/employment-projections",
            title: "Employment Projections",
            description:
              "Explore skilled workforce projections region, sector and district wise.",
            bgColor: "bg-green-600",
            icon: (
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512"
                className="w-16 h-16 text-[#9dd8d0] opacity-90"
                fill="currentColor"
              >
                <path d="M496 384H64V80c0-8.8-7.2-16-16-16H16C7.2 64 0 71.2 0 80v336c0 17.7 14.3 32 32 32h464c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zM464 96H345.9c-21.4 0-32.1 25.9-17 41l32.4 32.4L288 242.8l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0l-68.7 68.7c-6.3 6.3-6.3 16.4 0 22.6l22.6 22.6c6.3 6.3 16.4 6.3 22.6 0L192 237.3l73.4 73.4c12.5 12.5 32.8 12.5 45.3 0l96-96 32.4 32.4c15.1 15.1 41 4.4 41-17V112c0-8.8-7.2-16-16-16z"></path>
              </svg>
            ),
          },
          {
            id: "/district-map",
            title: "District Map",
            description:
              "Explore district level insights about TVET supply and demand indicators.",
            bgColor: "bg-indigo-700",
            icon: (
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 576 512"
                className="w-16 h-16 text-[#9dd8d0] opacity-90"
                fill="currentColor"
              >
                <path d="M408 120c0 54.6-73.1 151.9-105.2 192c-7.7 9.6-22 9.6-29.6 0C241.1 271.9 168 174.6 168 120C168 53.7 221.7 0 288 0s120 53.7 120 120zm8 80.4c3.5-6.9 6.7-13.8 9.6-20.6c.5-1.2 1-2.5 1.5-3.7l116-46.4C558.9 123.4 576 135 576 152l0 270.8c0 9.8-6 18.6-15.1 22.3L416 503l0-302.6zM137.6 138.3c2.4 14.1 7.2 28.3 12.8 41.5c2.9 6.8 6.1 13.7 9.6 20.6l0 251.4L32.9 502.7C17.1 509 0 497.4 0 480.4L0 209.6c0-9.8 6-18.6 15.1-22.3l122.6-49zM327.8 332c13.9-17.4 35.7-45.7 56.2-77l0 249.3L192 449.4 192 255c20.5 31.3 42.3 59.6 56.2 77c20.5 25.6 59.1 25.6 79.6 0zM288 152a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"></path>
              </svg>
            ),
          },
          {
            id: "/institutes",
            title: "TVET Providers",
            description:
              "Explore information on TVET institutes, companies offering training and programmes.",
            bgColor: "bg-slate-800",
            icon: (
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 640 512"
                className="w-16 h-16 text-[#9dd8d0] opacity-90"
                fill="currentColor"
              >
                <path d="M0 224v272c0 8.8 7.2 16 16 16h80V192H32c-17.7 0-32 14.3-32 32zm360-48h-24v-40c0-4.4-3.6-8-8-8h-16c-4.4 0-8 3.6-8 8v64c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8zm137.8-64l-160-106.7a32 32 0 0 0 -35.5 0l-160 106.7A32 32 0 0 0 128 138.7V512h128V368c0-8.8 7.2-16 16-16h96c8.8 0 16 7.2 16 16v144h128V138.7c0-10.7-5.4-20.7-14.3-26.6zM320 256c-44.2 0-80-35.8-80-80s35.8-80 80-80 80 35.8 80 80-35.8 80-80 80zm288-64h-64v320h80c8.8 0 16-7.2 16-16V224c0-17.7-14.3-32-32-32z"></path>
              </svg>
            ),
          },
          {
            id: "/growth-sector",
            title: "Growth Sector",
            description:
              "Explore insights on growth sectors for employment and skill development.",
            bgColor: "bg-indigo-700",
            icon: (
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512"
                className="w-16 h-16 text-[#9dd8d0] opacity-90"
                fill="currentColor"
              >
                <path d="M160 96a96 96 0 1 1 192 0A96 96 0 1 1 160 96zm80 152l0 264-48.4-24.2c-20.9-10.4-43.5-17-66.8-19.3l-96-9.6C12.5 457.2 0 443.5 0 427L0 224c0-17.7 14.3-32 32-32l30.3 0c63.6 0 125.6 19.6 177.7 56zm32 264l0-264c52.1-36.4 114.1-56 177.7-56l30.3 0c17.7 0 32 14.3 32 32l0 203c0 16.4-12.5 30.2-28.8 31.8l-96 9.6c-23.2 2.3-45.9 8.9-66.8 19.3L272 512z"></path>
              </svg>
            ),
          },
          {
            id: "/jobs",
            title: "Employment Trends",
            description:
              "Find trending employment opportunities in local and international job markets.",
            bgColor: "bg-gray-700",
            icon: (
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512"
                className="w-16 h-16 text-[#9dd8d0] opacity-90"
                fill="currentColor"
              >
                <path d="M320 336c0 8.8-7.2 16-16 16h-96c-8.8 0-16-7.2-16-16v-48H0v144c0 25.6 22.4 48 48 48h416c25.6 0 48-22.4 48-48V288H320v48zm144-208h-80V80c0-25.6-22.4-48-48-48H176c-25.6 0-48 22.4-48 48v48H48c-25.6 0-48 22.4-48 48v80h512v-80c0-25.6-22.4-48-48-48zm-144 0H192V96h128v32z"></path>
              </svg>
            ),
          },
          ...(showTvetSupply
            ? [
                {
                  id: "tvetSupply",
                  label: "tvetSupply",
                  icon: (
                    <>
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2"></path>
                      <path d="M15 7a2 2 0 0 1 2 2"></path>
                      <path d="M15 3a6 6 0 0 1 6 6"></path>
                    </>
                  ),
                },
              ]
            : []),
        ].map((card, index) => (
          <div
            onClick={() => navigatetoPages(card.id)}
            key={index}
            className={`relative overflow-hidden cursor-pointer ${card.bgColor} text-white h-96 flex items-center justify-center p-6 transform transition-transform hover:scale-105`}
          >
            <div className="absolute top-0 left-0 w-0 h-0 border-t-[120px] border-r-[120px] border-t-black border-r-transparent opacity-15 pointer-events-none" />

            <div className="absolute top-4 left-4 opacity-90 w-16 h-16">
              {card.icon}
            </div>

            <div className="relative text-right ml-auto">
              <h2 className="text-[25px] font-bold mb-2">{card.title}</h2>
              <p className="text-2xl italic">{card.description}</p>
            </div>
          </div>
        ))}
      </div>

      <div className="w-full text-center my-20 px-80">
        <h2 className="text-[35px] font-bold text-gray-800 mb-2">Partners</h2>
        <div
          className="max-w-[200px] h-[10px] mx-auto my-2 rounded-full"
          style={{
            background: "linear-gradient(90deg, #66cc66, #4caf50, #66cc66)",
            clipPath: "ellipse(50% 25% at 50% 50%)",
          }}
        ></div>

        <div className="overflow-x-auto whitespace-nowrap flex gap-6 justify-around items-center mt-8">
          {/* <img src={navtac} className="h-28 inline-block" alt="Logo 4" /> */}
          {/* <img src={bureau} className="h-28 inline-block" alt="Logo 5" /> */}
          <img
            onClick={() => navigateToTivetBody("Giz")}
            src={giz}
            className="h-28 inline-block cursor-pointer"
            alt="Logo 6"
          />
          <img
            onClick={() => navigateToTivetBody("PSDA")}
            src={psdalogo}
            className="h-28 inline-block cursor-pointer"
            alt="Logo 6"
          />
          <img
            onClick={() => navigateToTivetBody("PSDF")}
            src={psdflogo}
            className="h-28 inline-block cursor-pointer"
            alt="Logo 6"
          />
          <img
            onClick={() => navigateToTivetBody("PVTC")}
            src={pvtclogo}
            className="h-28 inline-block cursor-pointer"
            alt="Logo 6"
          />
          <img
            onClick={() => navigateToTivetBody("TEVTA")}
            src={tevcalogo}
            className="h-28 inline-block cursor-pointer"
            alt="Logo 6"
          />
          <img
            onClick={() => navigateToTivetBody("PBTE")}
            src={pbtelogo}
            className="h-28 inline-block cursor-pointer"
            alt="Logo 6"
          />
        </div>
      </div>

      <Modal
        isOpen={modalIsOpen}
        onRequestClose={closeModal}
        style={customStyles}
        contentLabel="Video Modal"
        ariaHideApp={false}
      >
        <div className="relative bg-black rounded-lg shadow-lg overflow-hidden">
          <button
            onClick={closeModal}
            className="absolute top-2 right-2 text-white text-3xl hover:text-red-500 z-10"
            aria-label="Close video"
          >
            &times;
          </button>

          <div className="w-full h-full">
            <video
              ref={videoRef}
              className="w-full h-auto rounded-b-lg"
              controls
              autoPlay
            >
              <source src={videoPreview} type="video/mp4" />
              Your browser does not support the video tag.
            </video>
          </div>
        </div>
      </Modal>

      <Modals
        isModalOpen={isModalOpen}
        title="My Modal Title"
        mainClass="w-[400px]"
        overlayClass="bg-black bg-opacity-50 w-full h-full"
      >
        <p>This is the modal content.</p>
        <button
          className="mt-4 bg-red-500 text-white px-4 py-2 rounded"
          onClick={() => setModalOpen(false)}
        >
          Close Modal
        </button>
      </Modals>
    </div>
  );
};

export default HomePage;
