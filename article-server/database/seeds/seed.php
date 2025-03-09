<?php

require_once('../../connection/connection.php');


//// Seed users table
$sql_users_seed = "
    insert into users (full_name, email, pass) values
    ('Yousef', 'yousef@gmail.com', '" . hash('sha256', 'qwer1234') . "'),
    ('Mohammad', 'mhmd@gmail.com', '" . hash('sha256', 'qwer1234') . "')
";

$result_users_seed = $db_connect->query($sql_users_seed);

if (!$result_users_seed) {
    die("Error occured during adding users to database: " . $db_connect->error);
}



//// Seed questions table
$sql_questions_seed = "
    INSERT INTO questions (user_id, question, answer) VALUES
    (1, 'What is the Software Development Lifecycle (SDLC) and why is it important?', 'SDLC is a framework outlining the stages of developing an application—from feasibility to deployment and maintenance. It ensures a structured, systematic, and quality-driven approach to building software.'),
    (1, 'What are the primary stages or models used in SDLC?', 'The report covers several models: Waterfall, B-Model, Incremental, V-Model, Spiral, Wheel-and-Spoke, Unified Process Model (RUP), and Rapid Application Development (RAD).'),
    (1, 'How does an SDLC model differ from a methodology?', 'A model outlines what steps or stages need to be completed, while a methodology explains both what to do and how to do it.'),
    (1, 'What software categories are identified in the report?', 'Software is categorized into three types: Category 1 (back-end functionality), Category 2 (services to end users or applications), and Category 3 (front-end or GUI applications).'),
    (1, 'What is the Waterfall Model?', 'The Waterfall Model is a linear and sequential approach to software development that flows from requirements through design, implementation, testing, deployment, and maintenance.'),
    (1, 'What key documents are used in the Waterfall Model?', 'Essential documents include the requirements document, preliminary design specification, interface and final design specifications, test plan, and operations manual.'),
    (1, 'For which type of software is the Waterfall Model best suited?', 'It is most efficient for Category 1 software, such as relational databases, compilers, or secure operating systems.'),
    (1, 'What is the B-Model and how does it extend the Waterfall Model?', 'The B-Model attaches a maintenance cycle to the Waterfall Model, ensuring continuous improvement and evolution after the initial release.'),
    (1, 'How does the Incremental Model modify the traditional Waterfall approach?', 'It introduces iterations—each a mini Waterfall cycle—allowing gradual product refinement, feedback incorporation, and risk mitigation.'),
    (1, 'What are the benefits of using the Incremental Model?', 'Benefits include early incremental releases, stakeholder feedback during iterations, and improved risk management by isolating issues in smaller segments.'),
    (1, 'What is the V-Model and how does it work?', 'The V-Model arranges the development process in a V shape, where the left side decomposes requirements into design elements and the right side verifies each stage with corresponding tests.'),
    (1, 'How does the V-Model ensure quality and verification?', 'Each design stage has a corresponding testing phase, ensuring that requirements and designs are validated systematically during integration.'),
    (1, 'What is the Spiral Model and who founded it?', 'Founded by Boehm, the Spiral Model is a risk-driven process that combines iterative development with systematic risk analysis in multiple cycles.'),
    (1, 'What are the advantages of the Spiral Model?', 'Its advantages include a strong emphasis on risk management, iterative refinement, and the flexibility to incorporate changes during development.'),
    (1, 'What is the Wheel-and-Spoke Model?', 'This model builds on the Spiral Model by starting with a prototype (the first spoke) and iteratively refining the system, ensuring conformity to a common API.'),
    (1, 'When is the Wheel-and-Spoke Model particularly useful?', 'It is ideal for projects that require a bottom-up approach with related programs sharing a common API, enabling iterative validation and rapid value delivery.'),
    (1, 'What is the Unified Process Model (RUP) and who developed it?', 'Developed by Rational Software, the Unified Process Model (RUP) is an iterative and use-case driven process that emphasizes risk management and model-based development.'),
    (1, 'What best practices are promoted in the Unified Process Model?', 'Best practices include iterative development, robust requirements management, component-based architecture, visual modeling, continuous quality verification, and controlled change management.'),
    (1, 'What is Rapid Application Development (RAD)?', 'RAD is a methodology emphasizing rapid prototyping and iterative development, with active stakeholder involvement to shorten development cycles.'),
    (1, 'What prominent approaches are associated with RAD?', 'Approaches under RAD include Agile methods, Extreme Programming (XP), Joint Application Development (JAD), Lean Development, and Scrum.')
";

$result_questions_seed = $db_connect->query($sql_questions_seed);

if (!$result_questions_seed) {
    die("Error occurred during adding questions to database: " . $db_connect->error);
}


$db_connect->close();
