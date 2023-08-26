1.	Strong entities:
    * Member(M_#, M_address, M_name)
    * Membership(type, fee)
    * Exercise(Description, exercise#, exercise_type, exercise_name)
    * Room(Building, room#)
    * Instructor(SSN, Instructor#, instructor_name)
    * Employee(SSN, position, salary)
    * External(SSN, Wage, hours)

2.	Weak entites:
    * ExerciseClass(exercise#, class#)

3. 1:1 Relationships:
    * None

4. 1:N Relationships:
    * Member(M_#, M_name, M_address, registration_date, type)
    * ExerciserClass(exercise#, class#, duration, date, start_time, building, room#, instructor#)

5. M:N Relationships:
    * Registers(R_date, M_#, class#)

Final Schema:

    * Member(M_#, M_name, M_address, registration_date, type)
    * ExerciseClass(exercise#, class#, duration, date, start_time, building, room#, instructor#)
    * Membership(type, fee)
    * Exercise(Description, exercise#, exercise_type, exercise_name)
    * Room(Building, room#)
    * Instructor(SSN, Instructor#, instructor_name)
    * Employee(SSN, position, salary)
    * External(SSN, Wage, hours)
    * Registers(R_date, M_#, class#)