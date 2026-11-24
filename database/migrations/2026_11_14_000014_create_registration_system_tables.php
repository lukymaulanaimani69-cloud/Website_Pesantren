<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('registration_periods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('academic_year', 30)->nullable();
            $table->dateTime('opens_at');
            $table->dateTime('closes_at');
            $table->boolean('is_active')->default(false)->index();
            $table->longText('requirements_text')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('registration_period_id')->constrained('registration_periods')->cascadeOnDelete();
            $table->string('registration_number', 50)->nullable()->unique();
            $table->string('student_name');
            $table->string('gender', 10)->default('L');
            $table->string('birth_place')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('previous_school')->nullable();
            $table->string('guardian_name');
            $table->string('guardian_relation', 50)->nullable();
            $table->string('guardian_contact', 100);
            $table->text('address')->nullable();
            $table->string('chosen_program')->nullable();
            $table->text('notes')->nullable();
            $table->string('status', 30)->default(\App\Enums\RegistrationStatus::DRAFT->value)->index();
            $table->text('admin_notes')->nullable();
            $table->timestamp('submitted_at')->nullable()->index();
            $table->timestamp('verified_at')->nullable();
            $table->timestamp('decided_at')->nullable();
            $table->timestamps();

            $table->index(['user_id', 'status']);
            $table->index(['registration_period_id', 'status']);
        });

        Schema::create('registration_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registration_id')->constrained('registrations')->cascadeOnDelete();
            $table->string('document_type', 50)->index();
            $table->string('disk', 30)->default('private');
            $table->string('path');
            $table->string('original_name');
            $table->string('mime_type', 100);
            $table->unsignedBigInteger('size_bytes');
            $table->timestamp('uploaded_at')->useCurrent();
            $table->timestamps();

            $table->index(['registration_id', 'document_type']);
        });

        Schema::create('registration_status_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registration_id')->constrained('registrations')->cascadeOnDelete();
            $table->foreignId('actor_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('from_status', 30)->nullable();
            $table->string('to_status', 30);
            $table->text('note')->nullable();
            $table->timestamp('created_at')->useCurrent();

            $table->index(['registration_id', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registration_status_histories');
        Schema::dropIfExists('registration_documents');
        Schema::dropIfExists('registrations');
        Schema::dropIfExists('registration_periods');
    }
};
